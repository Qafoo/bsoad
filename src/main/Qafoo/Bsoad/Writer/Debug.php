<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Writer;
use Qafoo\Bsoad\Writer;
use Qafoo\Bsoad\Struct;

/**
 * JSON output writer
 *
 * @version $Revision$
 */
class Debug extends Writer
{
    /**
     * Write HTTP interaction
     *
     * @param Struct\Interaction $interaction
     * @return void
     */
    public function write( Struct\Interaction $interaction )
    {
        echo $interaction->request, ' -> ', $interaction->response, PHP_EOL;
    }
}
