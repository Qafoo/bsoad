<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad;

/**
 * Abstract parser base class
 *
 * @version $Revision$
 * @private
 */
abstract class Parser
{
    /**
     * Push a packet to be sorted
     *
     * Packets we receive here, should be ACK'ed and pushed in correct order.
     *
     * @param Struct\Packet $packet
     * @return void
     */
    abstract public function push( Struct\Packet $packet );

    /**
     * Force close connection
     *
     * @return void
     */
    abstract public function finish();
}

