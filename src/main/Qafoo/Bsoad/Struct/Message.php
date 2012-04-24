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
abstract class Message extends Struct
{
    /**
     * HTTP version
     *
     * @var string
     */
    public $version;

    /**
     * Raw, unparsed HTTP headers
     *
     * @var array
     */
    public $rawHeaders = array();

    /**
     * HTTP headers as a hash map. If multiple headers with the same name occur 
     * this might cause lost headers. Check rawHeaders in this case.
     *
     * @var array
     */
    public $headers = array();

    /**
     * HTTP body
     *
     * @var string
     */
    public $body;
}

