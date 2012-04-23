<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Struct\Message;
use Qafoo\Bsoad\Struct\Message;

/**
 * Packet struct
 *
 * @version $Revision$
 */
class Response extends Message
{
    /**
     * HTTP response code
     *
     * @var int
     */
    public $code;

    /**
     * HTTP response message
     *
     * @var string
     */
    public $message;

    /**
     * COnstruct
     *
     * @param string $version
     * @param int $code
     * @param string $message
     * @return void
     */
    public function __construct( $version, $code, $message )
    {
        $this->version = $version;
        $this->code    = $code;
        $this->message = $message;
    }
}

