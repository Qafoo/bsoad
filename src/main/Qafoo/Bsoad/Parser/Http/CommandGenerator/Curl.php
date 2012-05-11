<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Parser\Http\CommandGenerator;
use Qafoo\Bsoad\Parser\Http\CommandGenerator;
use Qafoo\Bsoad\Struct;

/**
 * Generate command to reproduce HTTP request
 *
 * @version $Revision$
 * @private
 */
class Curl extends CommandGenerator
{

    /**
     * Get command to simulate request
     *
     * @param Struct\Message\Request $request
     * @return string
     */
    public function getCommand( Struct\Message\Request $request )
    {
        $command = 'curl -i -X ' . escapeshellarg( $request->method ) . ' ';
        $command .= escapeshellarg( 'http://' . $request->headers['Host'] . $request->path );

        foreach ( $request->rawHeaders as $header )
        {
            if ( ( strpos( $header, $request->method ) === 0 ) ||
                 ( strpos( $header, 'Host' ) === 0 ) )
            {
                continue;
            }

            $command .= ' -H ' . escapeshellarg( $header );
        }

        if ( $request->body )
        {
            $command .= ' --data-binary ' . escapeshellarg( $request->body );
        }

        return $command;
    }
}

