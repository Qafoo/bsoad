<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\ParserFactory;
use Qafoo\Bsoad\ParserFactory;
use Qafoo\Bsoad\Parser;
use Qafoo\Bsoad\Writer;
use Qafoo\Bsoad\Struct;

/**
 * *Really* dump dummy parser factory, which just always returns a HTTP parser
 *
 * @version $Revision$
 */
class Http extends ParserFactory
{
    /**
     * Create new parser
     *
     * Guess required parser from input packet
     *
     * @param Struct\Packet $packet
     * @return Parser
     */
    public function create( Struct\Packet $packet )
    {
        return new Parser\Http( $this->writer );
    }
}

