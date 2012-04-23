<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad;

/**
 * Output writer
 *
 * @version $Revision$
 */
abstract class Writer
{
    /**
     * Write HTTP interaction
     *
     * @param Struct\Interaction $interaction
     * @return void
     */
    abstract public function write( Struct\Interaction $interaction );
}

