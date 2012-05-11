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
use Qafoo\Bsoad\ParserFactory;

/**
 * Basic packet sorter
 *
 * @version $Revision$
 */
class Basic extends Sorter
{
    /**
     * Parser factory
     *
     * @var ParserFactory
     */
    protected $parserFactory;

    /**
     * Sorting queues
     *
     * @var Queue[]
     */
    protected $queues;

    /**
     * Stacks for remaining packets
     *
     * @var array[]
     */
    protected $stacks;

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
     * Push a packet to be sorted
     *
     * @param Struct\Packet $packet
     * @return void
     */
    public function push( Struct\Packet $packet )
    {
        $queueName = $this->getQueueName( $packet );
        if ( !isset( $this->queues[$queueName] ) )
        {
            // Construct new queue, if none exists yet
            $this->queues[$queueName] = new Queue( $this->parserFactory );
            $this->stacks[$queueName] = array();
        }

        if ( !$this->queues[$queueName]->accepts( $packet ) )
        {
            // If the queue cannot handle the packet yet, we put in a stack
            $this->stacks[$queueName][] = $packet;
        }

        // Try to handle all stacked packets, some may be available for
        // processing
        stackProcessing:
        foreach ( $this->stacks[$queueName] as $nr => $packet )
        {
            if ( $this->queues[$queueName]->accepts( $packet ) )
            {
                unset( $this->stacks[$queueName][$nr] );
                goto stackProcessing;
            }
        }

        // Check if this queue is finished
        if ( $this->queues[$queueName]->finish() )
        {
            if ( count( $this->stacks[$queueName] ) )
            {
                throw new \RuntimeException( "Queue reports to be finished, but there are still packets on the stack. This is kind of strange." );
            }

            unset( $this->queues[$queueName] );
            unset( $this->stacks[$queueName] );
        }
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

