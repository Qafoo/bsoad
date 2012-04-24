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
class Dispatcher extends Writer
{
    /**
     * Array of aggregated writers
     *
     * @var Writer[]
     */
    protected $writers;

    /**
     * Construct from aggregated writers
     *
     * @param Writer[] $writers
     * @return void
     */
    public function __construct( array $writers = array() )
    {
        foreach ( $writers as $writer )
        {
            $this->addWriter( $writer );
        }
    }

    /**
     * Add writer
     *
     * @param Writer $writer
     * @return void
     */
    public function addWriter( Writer $writer )
    {
        $this->writers[] = $writer;
    }

    /**
     * Write HTTP interaction
     *
     * @param Struct\Interaction $interaction
     * @return void
     */
    public function write( Struct\Interaction $interaction )
    {
        foreach ( $this->writers as $writer )
        {
            $writer->write( $interaction );
        }
    }
}

