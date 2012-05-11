<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Struct;
use Qafoo\Bsoad\Struct;

/**
 * Packet struct
 *
 * @version $Revision$
 */
class Interaction extends Struct
{
    /**
     * HTTP request
     *
     * @var SMessage\Request
     */
    public $request;

    /**
     * HTTP response
     *
     * @var Message\Response
     */
    public $response;

    /**
     * Construct
     *
     * @param Message\Request $request
     * @param Message\Response $response
     * @return void
     */
    public function __construct( Message\Request $request = null, Message\Response $response = null )
    {
        $this->request  = $request;
        $this->response = $response;
    }
}

