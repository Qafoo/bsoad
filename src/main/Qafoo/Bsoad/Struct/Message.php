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
     * HTTP headers
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

