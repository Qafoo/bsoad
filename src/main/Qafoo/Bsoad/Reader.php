<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad;

/**
 * Class implementing a reader for TShark
 *
 * @version $Revision$
 */
abstract class Reader
{
    /**
     * Process stream
     *
     * @param stream $stream
     * @return void
     */
    abstract public function process( $stream );
}

