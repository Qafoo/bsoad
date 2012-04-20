<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad;
use Qafoo\Bsoad\Struct;

/**
 * Class implementing a sorter from packets
 *
 * @version $Revision$
 */
abstract class Sorter
{
    /**
     * Push a packet to be sorted
     *
     * @param Struct\Packet $packet
     * @return void
     */
    abstract public function push( Struct\Packet $packet );
}

