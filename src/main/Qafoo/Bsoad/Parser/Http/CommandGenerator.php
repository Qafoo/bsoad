<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Parser\Http;
use Qafoo\Bsoad\Struct;

/**
 * Generate command to reproduce HTTP request
 *
 * @version $Revision$
 * @private
 */
abstract class CommandGenerator
{

    /**
     * Get command to simulate request
     *
     * @param Struct\Message\Request $request
     * @return string
     */
    abstract public function getCommand( Struct\Message\Request $request );
}

