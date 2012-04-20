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
    public $timestamp;

    public $frame;
    public $srcHost;
    public $dstHost;

    public $tcpSrcPort;
    public $tcpDstPort;
    public $tcpSequence;
    public $tcpLength;
    public $tcpFlags;
    public $tcpFlagsShow;

    public $headers = array();
    public $body;

    public $queued = false;
    public $processed = false;

    /**
     * Get string representation of packet
     *
     * @return string
     */
    public function __toString()
    {
        $time = new \DateTime( '@' . floor( $this->timestamp ) );
        return sprintf( "[%s] % 4d %s:% 5d -> %s:% 5d (% 5d +% 5d) % 8s %s %s\n",
            $time->format( 'r' ),
            $this->frame,
            $this->srcHost,
            $this->tcpSrcPort,
            $this->dstHost,
            $this->tcpDstPort,
            $this->tcpSequence,
            $this->tcpLength,
            decbin( $this->tcpFlags ),
            $this->tcpFlagsShow,
            reset( $this->headers )
        );
    }
}

