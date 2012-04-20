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
     * Packet timestamp
     *
     * @var float
     */
    public $timestamp;

    /**
     * Frame number
     *
     * @var int
     */
    public $frame;

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
     * TCP flags description
     *
     * @var string
     */
    public $tcpFlagsShow;

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
    public $queued = false;

    /**
     * Get string representation of packet
     *
     * @return string
     */
    public function __toString()
    {
        $time = new \DateTime( '@' . floor( $this->timestamp ) );
        return sprintf( "[%s] % 4d %s:% 5d -> %s:% 5d (% 5d +% 5d) % 8s %s\n",
            $time->format( 'r' ),
            $this->frame,
            $this->srcHost,
            $this->tcpSrcPort,
            $this->dstHost,
            $this->tcpDstPort,
            $this->tcpSequence,
            $this->tcpLength,
            decbin( $this->tcpFlags ),
            $this->tcpFlagsShow
        );
    }
}

