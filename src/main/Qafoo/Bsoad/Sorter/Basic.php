<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Sorter;
use Qafoo\Bsoad\Sorter;
use Qafoo\Bsoad\Struct;
use Qafoo\Bsoad\Writer;

/**
 * Basic packet sorter
 *
 * @version $Revision$
 */
class Basic extends Sorter
{
    /**
     * Sorting queues
     *
     * @var Queue[]
     */
    protected $queues;

    /**
     * Output writer
     *
     * @var Writer
     */
    protected $writer;

    /**
     * Construct from target writer
     *
     * @param Writer $writer
     * @return void
     */
    public function __construct( Writer $writer )
    {
        $this->writer = $writer;
    }

    /**
     * Push a packet to be sorted
     *
     * @param Struct\Packet $packet
     * @return void
     */
    public function push( Struct\Packet $packet )
    {
        if ( $packet->tcpLength === 0 )
        {
            return;
        }

        $queueName = $this->getQueueName( $packet );

        if ( !isset( $this->queues[$queueName] ) )
        {
            $this->queues[$queueName] = new Queue( $this->writer );
        }

        $this->queues[$queueName]->push( $packet );
    }

    /**
     * Get queue name
     *
     * The queue name generation is agnostic to the fact if the packet is a
     * request or a response.
     *
     * @param Struct\Packet $packet
     * @return void
     */
    protected function getQueueName( Struct\Packet $packet )
    {
        $queueName = array(
            $packet->srcHost . ':' . $packet->tcpSrcPort,
            $packet->dstHost . ':' . $packet->tcpDstPort,
        );
        sort( $queueName );
        return implode( ',', $queueName );
    }
}

