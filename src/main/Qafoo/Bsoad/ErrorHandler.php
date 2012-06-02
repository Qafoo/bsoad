<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad;

/**
 * Error handler
 *
 * @version $Revision$
 * @private
 */
class ErrorHandler
{
    /**
     * Output stream
     *
     * @var resource
     */
    protected $stream;

    /**
     * Eror levels, which should be converted into exceptions
     *
     * @var int
     */
    protected $level;

    /**
     * Array type to name mapping
     *
     * @var array
     */
    protected $errorType = array(
        E_STRICT            => 'Strict notice',
        E_NOTICE            => 'Notice',
        E_USER_NOTICE       => 'Notice',
        E_WARNING           => 'Warning',
        E_USER_WARNING      => 'Warning',
        E_RECOVERABLE_ERROR => 'Recoverable error',
        E_USER_ERROR        => 'Error',
        E_ERROR             => 'Error',
    );

    /**
     * Construct from print target stream
     *
     * @param resource $stream
     * @param int $level
     * @return void
     */
    public function __construct( $stream, $level = -1 )
    {
        $this->stream = $stream;
        $this->level  = $level;
    }

    /**
     * Handle error
     *
     * @param int $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     * @return void
     */
    public function handleError( $errno, $errstr, $errfile, $errline )
    {
        fwrite(
            $this->stream,
            sprintf(
                "\033[1;31m[%s] %s: %s in %s +%d\033[0m" . PHP_EOL,
                date( 'r' ),
                $this->errorType[$errno],
                $errstr,
                $errfile,
                $errline
            )
        );

        if ( $errno & $this->level )
        {
            throw new \RuntimeException( $this->errorType[$errno] . ': ' . $errstr );
        }
    }

    /**
     * Handle exception
     *
     * @param \Exception $exception
     * @return void
     */
    public function handleException( \Exception $exception )
    {
        fwrite(
            $this->stream,
            $exception . PHP_EOL
        );
        exit( 1 );
    }
}

