<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Sorter;
use Qafoo\Bsoad\Struct;
use Qafoo\Bsoad\Writer;

/**
 * Sorting queue
 *
 * @version $Revision$
 * @private
 */
class Queue
{
    /**
     * Queue has recieved the intial SYN packet
     *
     * @var bool
     */
    protected $syn = false;

    /**
     * Initial SYN packet has been acknowledged
     *
     * @var bool
     */
    protected $synAck = false;

    /**
     * Final FIN packet has been received
     *
     * @var bool
     */
    protected $finished = false;

    /**
     * Current sequence for source and dst port
     *
     * @var int[]
     */
    protected $sequence = array();

    /**
     * Packets, which are accepted by their sequence number
     *
     * @var Struct\Packet[]
     */
    protected $packets = array();

    /**
     * Aggregated data from packets
     *
     * @var string[]
     */
    protected $data = array();

    /**
     * SYN constant
     */
    const SYN = 2;

    /**
     * ACK constant
     */
    const ACK = 16;

    /**
     * FIN constant
     */
    const FIN = 1;

    /**
     * Check if queue already accepts the current packet
     *
     * @param Struct\Packet $packet
     * @return void
     */
    public function accepts( Struct\Packet $packet )
    {
        if ( $this->syn === false )
        {
            if ( !( $packet->tcpFlags & self::SYN ) )
            {
                return false;
            }

            $this->sequence[$packet->tcpSrcPort] = $packet->tcpSequence + 1;
            $this->syn                           = true;
            return true;
        }

        if ( $this->synAck === false )
        {
            if ( !( ( $packet->tcpFlags & self::SYN ) &&
                    ( $packet->tcpFlags & self::ACK ) ) )
            {
                return false;
            }

            $this->sequence[$packet->tcpSrcPort] = $packet->tcpSequence + 1;
            $this->synAck                        = true;
            return true;
        }

        if ( $this->sequence[$packet->tcpSrcPort] > $packet->tcpSequence )
        {
            // Packet already processed, classic duplicate
            return true;
        }

        if ( $this->sequence[$packet->tcpSrcPort] !== $packet->tcpSequence )
        {
            return false;
        }

        $this->packets[$packet->tcpSrcPort][$packet->tcpSequence] = $packet;
        $this->sequence[$packet->tcpSrcPort] = $packet->tcpSequence
            + $packet->tcpLength
            + ( (int) (bool) ( $packet->tcpFlags & self::FIN ) );

        if ( ( $packet->tcpFlags & self::ACK ) &&
             ( isset( $this->packets[$packet->tcpDstPort] ) ) )
        {
            foreach ( $this->packets[$packet->tcpDstPort] as $sequence => $oldPacket )
            {
                if ( $sequence > $packet->tcpAckNumber )
                {
                    break;
                }

                $oldPacket->queued = true;
            }
        }

        // @TODO: Factory correct parser
        // @TODO: Process queued data and push into parser

        return true;
    }

    /**
     * Force close connection
     *
     * @return void
     */
    public function finish()
    {
        return $this->finished;
    }

    /**
     * Check for finished packets
     *
     * @return void
     */
    public function checkFinished()
    {
        foreach ( $this->packets as $port => $packets )
        {
            if ( !isset( $this->data[$port] ) )
            {
                $this->data[$port] = '';
            }

            $offset = false;
            foreach ( $packets as $packet )
            {
                if ( $offset === false )
                {
                    // @TODO: This might be wrong, if we receive the second
                    // packet first. OTOH we do not want to process the entire
                    // TCP stream (SYN/ACK/FIN handling)…
                    $offset = $packet->tcpSequence;
                }

                if ( $packet->tcpSequence == $offset )
                {
                    $offset += max( $packet->tcpLength, 1 );
                    if ( !$packet->queued )
                    {
                        $this->data[$port] .= $packet->data;
                    }

                    $packet->queued = true;
                }
                else
                {
                    break;
                }
            }
        }
    }

    /**
     * parseNextHttpInteraction
     *
     * @return void
     */
    public function parseNextHttpInteraction( $close = false )
    {
        foreach ( $this->data as $port => $data )
        {
            while ( strlen( ( $data ) ) )
            {
                $result = $this->parseHttpMessage( $port, $data, $close );
                if ( $result === false )
                {
                    continue 2;
                }
                $this->data[$port] = $data = $result;
            }
        }
    }

    /**
     * Parse HTTP message from buffer
     *
     * If no complete HTTP message could be parsed this method will return
     * false. Otherwise the remaining buffer will be returned.
     *
     * @param int $port
     * @param string $data
     * @return void
     */
    protected function parseHttpMessage( $port, $data, $close )
    {
        if ( preg_match( '(\\A(?P<method>[A-Z]+) +(?P<path>[^\\s]+) +(?P<version>HTTP/\\d+\\.\\d+)\\r?$)mS', $data, $match ) )
        {
            $message = new Struct\Message\Request(
                $match['version'],
                $match['method'],
                $match['path']
            );
        }
        elseif ( preg_match( '(\\A(?P<version>HTTP/\\d+\.\\d+) +(?P<code>\\d+) +(?P<message>[^\\r\\n]*)\\r?$)mS', $data, $match ) )
        {
            $message = new Struct\Message\Response(
                $match['version'],
                $match['code'],
                $match['message']
            );
        }
        else
        {
            throw new \RuntimeException( "Invalid HTTP message: " . substr( $data, 0, 100 ) );
        }

        // Cut of read header
        $data = substr( $data, strlen( $match[0] ) + 1 );
        $message->rawHeaders[] = rtrim( $match[0], "\r" );

        $data = $this->parseHeaders( $data, $message );
        $transferEncoding = isset( $message->headers['Transfer-Encoding'] ) ? $message->headers['Transfer-Encoding'] : false;
        $contentLength    = isset( $message->headers['Content-Length'] ) ? (int) $message->headers['Content-Length'] : false;
        $contentType      = isset( $message->headers['Content-Type'] );

        if ( strpos( $data, "\r\n" ) !== 0 )
        {
            // Headers have not been completed yet, postpone
            return false;
        }
        $data = substr( $data, 2 );

        // Read response body
        $body = '';
        if ( $contentType &&
             ( $contentLength === false ) &&
             ( $transferEncoding === false ) )
        {
            // The server set a content type, but did not provide a content
            // length and did not answer in chunked transfer encoding. We
            // cannot know what contents are transmitted until the connection
            // has been closed.
            if ( !$close )
            {
                return false;
            }

            $body = $data;
        }
        elseif ( $contentLength )
        {
            // HTTP 1.1 supports chunked transfer encoding, if the according
            // header is not set, just read the specified amount of bytes.
            $bytesToRead = $contentLength ?: 0;

            // Read body only as specified by content length, everything else
            // are just footnotes, which are not handled yet.
            if ( strlen( $data ) < $bytesToRead )
            {
                return false;
            }
            $body = substr( $data, 0, $bytesToRead );
            $data = substr( $data, $bytesToRead + 2 );
        }
        elseif ( $transferEncoding )
        {
            // When Transfer-Encoding=chunked has been specified in the
            // response headers, read all chunks and sum them up to the body,
            // until the server has finished. Ignore all additional HTTP
            // options after that.
            do {
                if ( !strlen( $data ) )
                {
                    // Chunked response not complete yet, but no more
                    // data left.
                    return false;
                }

                // Get bytes to read, with option appending comment
                if ( preg_match( '(\\A(?P<bytes>[0-9a-f]+)(?:;.*)?\\r?$)mS', $data, $match ) )
                {
                    $bytesToRead = hexdec( $match['bytes'] );
                    $data = substr( $data, strlen( $match[0] ) + 1 );

                    // Read body only as specified by chunk sizes, everything else
                    // are just footnotes, which are not relevant for us.
                    $bytesLeft = $bytesToRead;
                    if ( strlen( $data ) < $bytesLeft )
                    {
                        return false;
                    }
                    $body .= substr( $data, 0, $bytesLeft );
                    $data = substr( $data, $bytesLeft + 2 );
                }
            } while ( $bytesToRead > 0 );
        }

        $message->body = $body;
        $this->messages[$port][] = $message;
    }

    /**
     * Parse headers from $data into $message
     *
     * Returns the $data buffer without the parsed contents
     *
     * @param string $data
     * @param Struct\Message $message
     * @return string
     */
    protected function parseHeaders( $data, Struct\Message $message )
    {
        // Read more headers
        while ( preg_match( '(\\A(?P<name>[A-Za-z-]+): +(?P<value>[^\\r]*)\\r?$)muS', $data, $match ) )
        {
            $message->rawHeaders[] = rtrim( $match[0], "\r" );
            $message->headers[$match['name']] = $match['value'];
            $data = substr( $data, strlen( $match[0] ) + 1 );
        }

        return $data;
    }


    /**
     * Push complete HTTP interactions to output writer
     *
     * @return void
     */
    public function pushHttpMessages( $close = false )
    {
        $ports = array_keys( $this->messages );
        if ( count( $ports ) < 2 )
        {
            return;
        }

        if ( !count( $this->messages[$ports[0]] ) ||
             !count( $this->messages[$ports[1]] ) )
        {
            return;
        }

        $request  = array_shift( $this->messages[$ports[0]] );
        $response = array_shift( $this->messages[$ports[1]] );

        if ( $request instanceof Struct\Message\Response )
        {
            $tmp = $request;
            $request = $response;
            $response = $tmp;
            unset( $tmp );
        }

        $request->curlCommand = $this->getCurlCommand( $request );

        $this->writer->write( new Struct\Interaction( $request, $response ) );

        if ( $close &&
             ( count( $this->messages[$ports[0]] ) ||
               count( $this->messages[$ports[1]] ) ||
               strlen( $this->data[$ports[0]] ) ||
               strlen( $this->data[$ports[1]] ) ) )
        {
            throw new \RuntimeException(
                "Connection closed, but unprocessed data in buffer."
            );
        }
    }

    /**
     * Get curl command to simulate request
     *
     * @param Struct\Message\Request $request
     * @return void
     */
    protected function getCurlCommand( Struct\Message\Request $request )
    {
        $command = 'curl -i -X ' . escapeshellarg( $request->method ) . ' ';
        $command .= escapeshellarg( 'http://' . $request->headers['Host'] . $request->path );

        foreach ( $request->rawHeaders as $header )
        {
            if ( ( strpos( $header, $request->method ) === 0 ) ||
                 ( strpos( $header, 'Host' ) === 0 ) )
            {
                continue;
            }

            $command .= ' -H ' . escapeshellarg( $header );
        }

        if ( $request->body )
        {
            $command .= ' --data-binary ' . escapeshellarg( $request->body );
        }

        return $command;
    }
}

