<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad;

/**
 * Basic parser factory
 *
 * @version $Revision$
 */
abstract class ParserFactory
{
    /**
     * Create new parser
     *
     * Guess required parser from input packet
     *
     * @param Struct\Packet $packet
     * @return Parser
     */
    abstract public function create( Struct\Packet $packet );
}

