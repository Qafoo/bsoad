<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Sorter;
use Qafoo\Bsoad\Struct;

/**
 * Sorting queue
 *
 * @version $Revision$
 */
class Queue
{
    /**
     * Packets in queue
     *
     * @var Struct\Packets[][]
     */
    protected $packets = array();

    /**
     * Aggregated data from packets
     *
     * @var string[]
     */
    protected $data = array();

    /**
     * Parsed messages from input and output data streams
     *
     * @var Struct\Message[]
     */
    protected $messages = array();

    /**
     * Push a packet to be sorted
     *
     * @param Struct\Packet $packet
     * @return void
     */
    public function push( Struct\Packet $packet )
    {
        // Reset queue if a first package in the current queue is received
        // again. This means a connection on the same source / target port
        // combination has been reestablished after a FIN.
        if ( ( isset( $this->packets[$packet->tcpSrcPort] ) ) &&
             ( isset( $this->packets[$packet->tcpSrcPort][1] ) ) )
        {
            $this->packets[$packet->tcpSrcPort] = array();
        }

        $this->packets[$packet->tcpSrcPort][$packet->tcpSequence] = $packet;
        ksort( $this->packets[$packet->tcpSrcPort], SORT_NUMERIC );

        $this->checkFinished();
        $this->parseNextHttpInteraction();
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
                    $packet->queued = true;
                    $offset += max( $packet->tcpLength, 1 );
                    $this->data[$port] .= $packet->data;
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
    public function parseNextHttpInteraction()
    {
        foreach ( $this->data as $port => $copy )
        {
            do {
                $data = ltrim( $copy );
                if ( preg_match( '(\\A(?P<method>[A-Z]+) +(?P<path>[^\\s]+) +(?P<version>HTTP/\\d+\\.\\d+)\\r?$)muS', $data, $match ) )
                {
                    $message = new Struct\Message\Request(
                        $match['version'],
                        $match['method'],
                        $match['path']
                    );
                }
                elseif ( preg_match( '(\\A(?P<version>HTTP/\\d+\.\\d+) +(?P<code>\\d+) +(?P<message>.*)\\r?$)muS', $data, $match ) )
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
                $message->headers[] = trim( $match[0] );
                $data = ltrim( substr( $data, strlen( $match[0] ) ) );

                // Read more headers
                $contentLength = false;
                while ( preg_match( '(\\A(?P<name>[A-Za-z-]+): +(?P<value>.*)\\r?$)muS', $data, $match ) )
                {
                    $message->headers[] = trim( $match[0] );
                    $data = substr( $data, strlen( $match[0] ) + 1 );

                    if ( $match['name'] === 'Content-Length' )
                    {
                        $contentLength = (int) $match['value'];
                    }
                }
                $data = substr( $data, 2 );

                if ( $contentLength !== false )
                {
                    $message->body = substr( $data, 0, $contentLength );
                    $data = substr( $data, $contentLength );
                }

                if ( strlen( $message->body ) < $contentLength )
                {
                    // Packet is not complete yet … skip processing
                    continue 2;
                }

                $this->message[$port][] = $message;
                $this->data[$port] = $copy = $data;
            }
            while ( strlen( trim( $data ) ) );
        }
    }
}

