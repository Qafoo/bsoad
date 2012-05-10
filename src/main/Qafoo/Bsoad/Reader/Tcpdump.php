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
 * Class implementing a reader for Tcpdump
 *
 * @version $Revision$
 */
class Tcpdump extends Reader
{
    /**
     * Packet sorter
     *
     * @var Sorter
     */
    protected $sorter;

    /**
     * Flag indicating if the file header has been checked
     *
     * @var mixed
     */
    protected $checked = false;

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
        socket_set_blocking( $stream, false );
        $buffer = '';
        while ( !feof( $stream ) )
        {
            while ( $data = fread( $stream, 8192 ) )
            {
                $buffer .= $data;
                usleep( 100 );
            }

            if ( !$this->checked )
            {
                $buffer = $this->checkFileHeader( $buffer );
            }

            if ( $this->checked )
            {
                $buffer = $this->analyzePacket( $buffer );
            }

            usleep( 10 * 1000 );
        }

        while ( $buffer = $this->analyzePacket( $buffer ) );
    }

    /**
     * Check file header
     *
     * Returns the buffer without the file header, if valid. Throws runtime
     * exceptions otherwise.
     *
     * @param string $buffer
     * @return string
     */
    protected function checkFileHeader( $buffer )
    {
        if ( strlen( $buffer ) < 24 )
        {
            return $buffer;
        }

        $data = $this->read( 'Vblock/vmajor/vminor', $buffer, 8 );
        if( dechex( $data['block'] ) !== 'a1b2c3d4' )
        {
            throw new \RuntimeException( "Input file format is invalid." );
        }

        if ( $data['major'] !== 2 )
        {
            throw new \RuntimeException( "Only input format version 2 is accepted." );
        }

        $data = $this->read( 'Vzone/Vsigfig/Vlength/Vnetwork', $buffer, 16 );
        if ( $data['network'] !== 1 )
        {
            throw new \RuntimeException( "Invalid network type." );
        }

        $this->checked = true;
        return $buffer;
    }

    /**
     * Analyze next packet
     *
     * Extracts the next packet from the current buffer. Returns the remainings 
     * of the buffer.
     *
     * @param string $buffer
     * @return string
     */
    protected function analyzePacket( $buffer )
    {
        if ( strlen( $buffer ) < 16 )
        {
            return $buffer;
        }

        $packetHeader = substr( $buffer, 0, 16 );
        $packetData   = $this->read( 'Vsec/Vusec/Vlength/Vorig', $packetHeader, 16 );
        if ( $packetData['length'] < 0 || $packetData['orig'] < 0 )
        {
            throw new \RuntimeException( "Could not parse packet header" );
        }

        $packetContent = substr( $buffer, 16, $packetData['length'] );
        if ( !strlen( $packetContent ) ||
             ( strlen( $packetContent ) < $packetData['length'] ) )
        {
            return $buffer;
        }

        $buffer = substr( $buffer, 16 + $packetData['length'] );

        $packet = new Struct\Packet();
        $packet->time = (float) ( $packetData['sec'] . '.' . $packetData['usec'] );

        $ethernet = $this->parseEthernetHeader( $packetContent, $packet );

        switch ( $ethernet['type'] )
        {
            case 8:
                $ip = $this->parseIPv4Header( $packetContent, $packet );
                break;

            case 56710:
                $ip = $this->parseIPv6Header( $packetContent, $packet );
                break;

            default:
                throw new \RuntimeException( sprintf( "Invalid network type: 0x%04x -- only IPv4 and IPv6 accepted.", $data['type'] ) );
        }

        $tcp      = $this->parseTcpHeader( $packetContent, $packet );

        $this->sorter->push( $packet );
        return $buffer;
    }

    /**
     * Parse ethernet header
     *
     * Return all info as an array, and embed important info in packet struct.
     *
     * @param string $buffer
     * @param Struct\Packet $packet
     * @return array
     */
    protected function parseEthernetHeader( &$buffer, Struct\Packet $packet )
    {
        return $this->read( 'h12src/h12dst/vtype', $buffer, 14 );
    }

    /**
     * Parse IPv4 header
     *
     * Return all info as an array, and embed important info in packet struct.
     *
     * @param string $buffer
     * @param Struct\Packet $packet
     * @return array
     */
    protected function parseIPv4Header( &$buffer, Struct\Packet $packet )
    {
        $data = $this->read(
            'Cversion/' .
            'Ctos/' .
            'vlength/' .
            'vid/' .
            'Cflags/' .
            'Coffset/' .
            'Cttl/' .
            'Cprotocol/' .
            'vchecksum/' .
            'Nsrc/' .
            'Ndst',
            $buffer,
            20
        );

        $data['ihl']     = $data['version'] & ( ( 2 << 4 ) - 1 );
        $data['version'] = $data['version'] >> 4;
        $data['offset']  = $data['offset'] | ( ( $data['flags'] & ( ( 2 << 5 ) - 1 ) ) << 8 );
        $data['flags']   = $data['flags'] >> 5;

        if ( $data['protocol'] !== 6 )
        {
            throw new \RuntimeException( "Not a TCP packet." );
        }

        if ( $data['ihl'] > 5 )
        {
            throw new \RuntimeException( "@TODO: Reading options not yet supported." );
        }

        // @TODO: Calculate checksum?

        $packet->srcHost = long2ip( $data['src'] );
        $packet->dstHost = long2ip( $data['dst'] );

        return $data;
    }

    /**
     * Parse IPv6 header
     *
     * Return all info as an array, and embed important info in packet struct.
     *
     * @param string $buffer
     * @param Struct\Packet $packet
     * @return array
     */
    protected function parseIPv6Header( &$buffer, Struct\Packet $packet )
    {
        $data = $this->read(
            'Nprotocol/' .
            'nlength/' .
            'Cnext/' .
            'Climit/' .
            'H32src/' .
            'H32dst',
            $buffer,
            40
        );

        $data['class']    = $data['protocol'] & ( ( 1 << 20 ) - 1 );
        $data['label']    = ( $data['protocol'] >> 20 ) & ( ( 1 << 8 ) - 1 );
        $data['protocol'] = $data['protocol'] >> 28;

        if ( $data['protocol'] !== 6 )
        {
            throw new \RuntimeException( "Not a TCP packet." );
        }

        $packet->srcHost = $data['src'];
        $packet->dstHost = $data['dst'];

        return $data;
    }

    /**
     * Parse TCP header
     *
     * Return all info as an array, and embed important info in packet struct.
     *
     * @param string $buffer
     * @param Struct\Packet $packet
     * @return array
     */
    protected function parseTcpHeader( &$buffer, Struct\Packet $packet )
    {
        $data = $this->read(
            'nsrc/' .
            'ndst/' .
            'NseqNo/' .
            'NackNo/' .
            'noffset/' .
            'nwindow/' .
            'nchecksum/' .
            'nurgent',
            $buffer,
            20
        );

        $data['flags']  = $data['offset'] & ( ( 1 << 6 ) - 1 );
        $data['offset'] = $data['offset'] >> 12;

        if ( $data['urgent'] > 0 )
        {
            throw new \RuntimeException( "@TODO: Cannot handle urgent data yet." );
        }

        $packet->tcpSrcPort  = $data['src'];
        $packet->tcpDstPort  = $data['dst'];

        $packet->tcpAckNumber = $data['ackNo'];
        $packet->tcpSequence  = $data['seqNo'];
        $packet->tcpFlags     = $data['flags'];

        $data['options'] = array();
        for ( $i = 5; $i < $data['offset']; ++$i )
        {
            $option = $this->read( "Noption", $buffer, 4 );
            $data['options'][] = reset( $option );
        }

        $packet->data      = $buffer;
        $packet->tcpLength = strlen( $packet->data );

        return $data;
    }

    /**
     * Read from buffer
     *
     * Return the values specified by the pattern. And removes the read content 
     * from the buffer.
     *
     * @param string $pattern
     * @param string $buffer
     * @param string $length
     * @return array
     */
    protected function read( $pattern, &$buffer, $length )
    {
        // @TODO: Detect length automatically?
        if ( strlen( $buffer ) < $length )
        {
            throw new \RuntimeException( "Not enough content in buffer." );
        }

        // @TODO: Handle Little/Big Endian in pattern?
        $data = unpack( $pattern, substr( $buffer, 0, $length ) );
        $buffer = substr( $buffer, $length );

        return $data;
    }

    /**
     * Debugging helper: Print buffer
     *
     * @param string $buffer
     * @param int $lines
     * @return void
     * @private
     */
    protected function printBuffer( $buffer, $lines = 10 )
    {
        $string = substr( $buffer, 0, $lines * 4 );
        for ( $i = 0; $i < strlen( $string ); ++$i )
        {
            printf( "%08s %02x ", decbin( ord( $string[$i] ) ), ord( $string[$i] ) );
            if ( ( ( $i + 1 ) % 4 ) === 0 ) echo PHP_EOL;
        }
    }
}

