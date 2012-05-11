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
 * Message aggregator
 *
 * @version $Revision$
 * @private
 */
class Aggregate extends Writer
{
    /**
     * Interactions array
     *
     * @var Struct\Interaction[]
     */
    protected $interactions = array();

    /**
     * Write HTTP interaction
     *
     * @param Struct\Interaction $interaction
     * @return void
     */
    public function write( Struct\Interaction $interaction )
    {
        $this->interactions[] = $interaction;
    }

    /**
     * Get collected interactions
     *
     * @return void
     */
    public function getInteractions()
    {
        return $this->interactions;
    }
}

