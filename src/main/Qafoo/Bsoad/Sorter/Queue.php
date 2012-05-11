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
use Qafoo\Bsoad\ParserFactory;

/**
 * Sorting queue
 *
 * @version $Revision$
 * @private
 */
class Queue
{
    /**
     * Parser factory
     *
     * @var ParserFactory
     */
    protected $parserFactory;

    /**
     * Parser
     *
     * @var Parser
     */
    protected $parser;

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
    protected $finished = array();

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
     * COnstruct from parser factory
     *
     * @param ParserFactory $parserFactory
     * @return void
     */
    public function __construct( ParserFactory $parserFactory )
    {
        $this->parserFactory = $parserFactory;
    }

    /**
     * Check if queue already accepts the current packet
     *
     * @param Struct\Packet $packet
     * @return void
     */
    public function accepts( Struct\Packet $packet )
    {
        if ( !$this->isSyned( $packet ) )
        {
            return false;
        }

        if ( !$this->isSynAcked( $packet ) )
        {
            return false;
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

        $this->processAckPacket( $packet );

        $this->packets[$packet->tcpSrcPort][$packet->tcpSequence] = $packet;
        $this->sequence[$packet->tcpSrcPort] = $packet->tcpSequence
            + $packet->tcpLength
            + ( (int) (bool) ( $packet->tcpFlags & Struct\Packet::FIN ) );

        $this->processDataPackets();

        return true;
    }

    /**
     * Check if connection has been established, or the current package
     * establishes the connection.
     *
     * @param Struct\Packet $packet
     * @return bool
     */
    protected function isSyned( Struct\Packet $packet )
    {
        if ( $this->syn === true )
        {
            return true;
        }

        if ( !( $packet->tcpFlags & Struct\Packet::SYN ) )
        {
            return false;
        }

        $this->sequence[$packet->tcpSrcPort] = $packet->tcpSequence + 1;
        $this->finished[$packet->tcpSrcPort] = false;
        $this->finished[$packet->tcpDstPort] = false;
        $this->syn                           = true;
        return true;
    }

    /**
     * Check if connection has been fully established, or the current package
     * establishes the connection.
     *
     * @param Struct\Packet $packet
     * @return bool
     */
    protected function isSynAcked( Struct\Packet $packet )
    {
        if ( $this->synAck === true )
        {
            return true;
        }

        if ( !( ( $packet->tcpFlags & Struct\Packet::SYN ) &&
                ( $packet->tcpFlags & Struct\Packet::ACK ) ) )
        {
            return false;
        }

        $this->sequence[$packet->tcpSrcPort] = $packet->tcpSequence + 1;
        $this->synAck                        = true;
        return true;
    }

    /**
     * Process ACK packet
     *
     * ACKs all packets depending on the ack number in the received ACK packet.
     *
     * @param Struct\Packet $packet
     * @return void
     */
    protected function processAckPacket( Struct\Packet $packet )
    {
        if ( ( $packet->tcpFlags & Struct\Packet::ACK ) &&
             ( isset( $this->packets[$packet->tcpDstPort] ) ) )
        {
            foreach ( $this->packets[$packet->tcpDstPort] as $sequence => $oldPacket )
            {
                if ( $sequence > $packet->tcpAckNumber )
                {
                    return;
                }

                $oldPacket->acked = true;
            }
        }
    }

    /**
     * Process all received data packets
     *
     * Passes on the data packets to the parser, which then may handle the
     * contents of the TCP communication.
     *
     * @return void
     */
    protected function processDataPackets()
    {
        foreach ( $this->packets as $port => $packets )
        {
            foreach ( $packets as $sequence => $packet )
            {
                if ( !$packet->acked )
                {
                    break;
                }

                if ( $packet->tcpFlags & Struct\Packet::FIN )
                {
                    $this->finished[$port] = true;
                }

                if ( $packet->tcpLength <= 0 )
                {
                    unset( $this->packets[$port][$sequence] );
                    continue;
                }

                if ( !$this->parser )
                {
                    $this->parser = $this->parserFactory->create( $packet );
                }

                $this->parser->push( $packet );
                unset( $this->packets[$port][$sequence] );
            }
        }
    }

    /**
     * Force close connection
     *
     * @return void
     */
    public function finish()
    {
        if ( array_reduce(
                $this->finished,
                function ( $last, $current )
                {
                    return $last && $current;
                },
                true
            ) )
        {
            if ( $this->parser )
            {
                $this->parser->finish();
            }

            return true;
        }

        return false;
    }
}

