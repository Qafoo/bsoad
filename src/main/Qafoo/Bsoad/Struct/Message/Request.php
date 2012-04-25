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
class Request extends Message
{
    /**
     * HTTP request method
     *
     * @var string
     */
    public $method;

    /**
     * HTTP request path
     *
     * @var string
     */
    public $path;

    /**
     * Curl command to reproduce the request
     *
     * @var string
     */
    public $curlCommand;

    /**
     * COnstruct
     *
     * @param string $version
     * @param string $method
     * @param string $path
     * @return void
     */
    public function __construct( $version, $method, $path )
    {
        $this->version = $version;
        $this->method  = $method;
        $this->path    = $path;
    }

    /**
     * Return string representation
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf( '%s %s http://%s/%s',
            $this->version,
            $this->method,
            $this->headers['Host'],
            $this->path
        );
    }
}

