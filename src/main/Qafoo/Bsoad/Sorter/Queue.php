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
}

