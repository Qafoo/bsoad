<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Struct;
use Qafoo\Bsoad\Struct;

/**
 * Packet struct
 *
 * @version $Revision$
 */
class Packet extends Struct
{
    /**
     * Time
     *
     * @var float
     */
    public $time;

    /**
     * Source host
     *
     * @var string
     */
    public $srcHost;

    /**
     * Destination host
     *
     * @var string
     */
    public $dstHost;

    /**
     * Source port
     *
     * @var int
     */
    public $tcpSrcPort;

    /**
     * Destination port
     *
     * @var int
     */
    public $tcpDstPort;

    /**
     * TCP sequence number
     *
     * @var int
     */
    public $tcpSequence;

    /**
     * TCP acknowledge number
     *
     * @var int
     */
    public $tcpAckNumber;

    /**
     * TCP package length
     *
     * @var int
     */
    public $tcpLength;

    /**
     * TCP flags
     *
     * @var int
     */
    public $tcpFlags;

    /**
     * Package data
     *
     * @var string
     */
    public $data;

    /**
     * Processing status
     *
     * @var mixed
     */
    public $acked = false;

    /**
     * FIN constant
     */
    const FIN = 1;

    /**
     * SYN constant
     */
    const SYN = 2;

    /**
     * RST constant
     */
    const RST = 4;

    /**
     * PSH constant
     */
    const PSH = 8;

    /**
     * ACK constant
     */
    const ACK = 16;

    /**
     * URG constant
     */
    const URG = 32;

    /**
     * Get string representation of packet
     *
     * @return string
     */
    public function __toString()
    {
        $time = new \DateTime( '@' . floor( $this->time ) );
        return sprintf( "[%s] %s:% 5d -> %s:% 5d [%s] (% 10d +% 5d) %06s %s(%d byte)\n",
            $time->format( 'r' ),
            $this->srcHost,
            $this->tcpSrcPort,
            $this->dstHost,
            $this->tcpDstPort,
            $this->acked ? 'x' : ' ',
            $this->tcpSequence,
            $this->tcpLength,
            decbin( $this->tcpFlags ),
            ( $this->tcpFlags & self::URG ? 'URG ' : '' ) .
            ( $this->tcpFlags & self::ACK ? 'ACK ' : '' ) .
            ( $this->tcpFlags & self::PSH ? 'PSH ' : '' ) .
            ( $this->tcpFlags & self::RST ? 'RST ' : '' ) .
            ( $this->tcpFlags & self::SYN ? 'SYN ' : '' ) .
            ( $this->tcpFlags & self::FIN ? 'FIN ' : '' ),
            $this->tcpLength
        );
    }
}

