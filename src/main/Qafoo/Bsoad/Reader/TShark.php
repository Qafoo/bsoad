<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Reader;
use Qafoo\Bsoad\Reader;
use Qafoo\Bsoad\Sorter;
use Qafoo\Bsoad\Struct;

/**
 * Class implementing a reader for TShark
 *
 * @version $Revision$
 */
class TShark extends Reader
{
    /**
     * Packet sorter
     *
     * @var Sorter
     */
    protected $sorter;

    /**
     * COnstruct from packet sorter
     *
     * @param Sorter $sorter
     * @return void
     */
    public function __construct( Sorter $sorter )
    {
        $this->sorter = $sorter;
    }

    /**
     * Process stream
     *
     * @param stream $stream
     * @return void
     */
    public function process( $stream )
    {
        while ( !feof( $stream ) )
        {
            // Skip unwanted Header
            while ( ( $line = fgets( $stream ) ) &&
                    ( !preg_match( '(<packet)', $line ) ) );

            $packetXml = $line;
            while ( ( $line = fgets( $stream ) ) &&
                    ( !preg_match( '(</packet)', $line ) ) )
            {
                $packetXml .= $line;
            }
            $packetXml .= $line;

            if ( $packetXml )
            {
                $this->analyzePacket( $packetXml );
            }
        }
    }

    /**
     * Analyze packet
     *
     * Convert the XML packet dump into a packet struct -- or at least the
     * important data
     *
     * @param mixed $packetXml
     * @return void
     */
    protected function analyzePacket( $packetXml )
    {
        $doc = new \DOMDocument();
        $doc->loadXml( $packetXml );

        $xPath = new \DOMXPath( $doc );

        $packet = new Struct\Packet();
        $packet->timestamp = (float) $xPath->evaluate( 'string(
            //proto[@name="geninfo"]//field[@name="timestamp"]/@value
        )' );

        $packet->srcHost = $xPath->evaluate( 'string(
            //proto[@name="ip"]//field[@name="ip.src_host"]/@show
        )' );
        $packet->dstHost = $xPath->evaluate( 'string(
            //proto[@name="ip"]//field[@name="ip.dst_host"]/@show
        )' );

        $packet->tcpSrcPort  = (int) $xPath->evaluate( 'string(
            //proto[@name="tcp"]//field[@name="tcp.srcport"]/@show
        )' );
        $packet->tcpDstPort  = (int) $xPath->evaluate( 'string(
            //proto[@name="tcp"]//field[@name="tcp.dstport"]/@show
        )' );
        $packet->tcpSequence = (int) $xPath->evaluate( 'string(
            //proto[@name="tcp"]//field[@name="tcp.seq"]/@show
        )' );
        $packet->tcpLength = (int) $xPath->evaluate( 'string(
            //proto[@name="tcp"]//field[@name="tcp.len"]/@show
        )' );
        $packet->tcpFlags = hexdec( $xPath->evaluate( 'string(
            //proto[@name="tcp"]//field[@name="tcp.flags"]/@value
        )' ) ) & 127;
        $packet->tcpFlagsShow = $xPath->evaluate( 'string(
            //proto[@name="tcp"]//field[@name="tcp.flags"]/@showname
        )' );

        // Some packets seem not to be recognized by tshark as HTTP, so we
        // "parse" them ourselves.
        if ( $rawData = $xPath->evaluate( 'string(
                //proto[@name="tcp"]//field[@name="tcp.data"]/@value
            )' ) )
        {
            $this->parseRawHttp( $packet, $this->decodeHexString( $rawData ) );
        }

        if ( $xPath->query( '//proto[@name="http"]' )->length )
        {
            $this->handleParsedHttp( $packet, $xPath );
        }

        // We only care for actual HTTP packets
        if ( $packet->headers )
        {
            $this->sorter->push( $packet );
        }
    }

    /**
     * Fix header data in the "parsed" requests of TShark
     *
     * @param string $headerString
     * @return string
     */
    protected function fixHeader( $headerString )
    {
        $headerString = str_replace(
            array( '\\r', '\\n', '\\v', '\\t', '\\\\' ),
            array( "\r", "\n", "\v", "\t", "\\" ),
            $headerString
        );

        return trim ( $headerString );
    }

    /**
     * Decode a hex string, as found in TShark XML
     *
     * @param string $string
     * @return string
     */
    protected function decodeHexString( $string )
    {
        $body = '';
        while ( $string )
        {
            $body  .= chr( hexdec( substr( $string, 0, 2 ) ) );
            $string = substr( $string, 2 );
        }

        return $body;
    }

    /**
     * Handle the "parsed" HTTP response, as found by TShark
     *
     * @param Struct\Packet $packet
     * @param \DOMXPath $xPath
     * @return void
     */
    protected function handleParsedHttp( Struct\Packet $packet, \DOMXPath $xPath )
    {
        foreach ( $xPath->query( '//proto[@name="http"]/field' ) as $field )
        {
            if ( $field->hasAttribute( 'showname' ) )
            {
                $value = $field->getAttribute( 'showname' );
            }
            else
            {
                $value = $field->getAttribute( 'show' );
            }

            if ( !( $value = $this->fixHeader( $value ) ) )
            {
                // After an "empty" header only special self-introduced headers 
                // from tshark will follow. We skip those.
                break;
            }
            $packet->headers[] = $value;
        }

        $packet->body = $this->decodeHexString( $xPath->evaluate( 'string(
            //proto[@name="http"]//field[@name="data.data"]/@value
        )' ) );
    }

    /**
     * Parse the RAW HTTP data into our header and body struct
     *
     * @param Struct\Packet $packet
     * @param string $data
     * @return void
     */
    protected function parseRawHttp( Struct\Packet $packet, $data )
    {
        $lines = preg_split( '(\r\n|\r|\n)', $data );

        while ( ( $line = array_shift( $lines ) ) &&
                ( trim( $line ) !== '' ) )
        {
            $packet->headers[] = trim( $line );
        }

        $packet->body = implode( "\n", $lines );
    }
}

