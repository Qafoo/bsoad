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
     * @var array
     */
    protected $packets = array();

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
        if ( ( $packet->tcpSequence === 1 ) &&
             ( isset( $this->packets[$packet->tcpSrcPort] ) ) &&
             ( isset( $this->packets[$packet->tcpSrcPort][1] ) ) )
        {
            $this->packets[$packet->tcpSrcPort] = array();
        }

        $this->packets[$packet->tcpSrcPort][$packet->tcpSequence] = $packet;
        ksort( $this->packets[$packet->tcpSrcPort], SORT_NUMERIC );

        $this->checkFinished();
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
            $offset = 1;
            foreach ( $packets as $packet )
            {
                if ( $packet->tcpSequence == $offset )
                {
                    $packet->queued = true;
                    $offset += $packet->tcpLength;
                }
                else
                {
                    break;
                }
            }
        }

        $ports = array_keys( $this->packets );
        if ( count( $ports ) < 2 )
        {
            return;
        }

        reset( $this->packets[$ports[0]] );
        reset( $this->packets[$ports[1]] );

        while ( ( $p1 = current( $this->packets[$ports[0]] ) ) &&
                ( $p1->queued === true ) &&
                ( $p2 = current( $this->packets[$ports[1]] ) ) &&
                ( $p2->queued === true ) )
        {
            next( $this->packets[$ports[0]] );
            next( $this->packets[$ports[1]] );

            if ( $p1->processed === true )
            {
                continue;
            }

            $p1->processed = true;
            $p2->processed = true;

            echo "Writing:\n - $p1 - $p2\n";
        }
    }
}

