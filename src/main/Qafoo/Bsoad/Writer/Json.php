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
class Json extends Writer
{
    /**
     * Socket to write to
     *
     * @var stream
     */
    protected $socket;

    /**
     * Construct from sockt to write to
     *
     * @param mixed $socket
     * @return void
     */
    public function __construct( $socket )
    {
        $this->socket = $socket;
    }

    /**
     * Write HTTP interaction
     *
     * @param Struct\Interaction $interaction
     * @return void
     */
    public function write( Struct\Interaction $interaction )
    {
        fwrite(
            $this->socket,
            json_encode( $interaction ) . PHP_EOL
        );
    }
}

