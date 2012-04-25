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
 * Filter
 *
 * @version $Revision$
 */
class Filter extends Writer
{
    /**
     * Array of blacklist filter rules
     *
     * Array should be defined as:
     * <code>
     *  array(
     *      <property> => array(
     *          <regexp>,
     *          …
     *      ),
     *      …
     *  ),
     * </code>
     *
     * @var array
     */
    protected $blacklist = array();

    /**
     * Array of whitelist filter rules
     *
     * Array should be defined as:
     * <code>
     *  array(
     *      <property> => array(
     *          <regexp>,
     *          …
     *      ),
     *      …
     *  ),
     * </code>
     *
     * @var array
     */
    protected $whitelist = array();

    /**
     * Aggregated writer
     *
     * will receive the filtered interactions
     *
     * @var Writer
     */
    protected $writer;

    /**
     * Construct from aggregated writer and optional black- and whitelist
     *
     * Black- and whitelists are defined as:
     *
     * <code>
     *  array(
     *      <property> => array(
     *          <regexp>,
     *          …
     *      ),
     *      …
     *  ),
     * </code>
     *
     * @param Writer $writer
     * @param array $blacklist
     * @param array $whitelist
     * @return void
     */
    public function __construct( Writer $writer, array $blacklist = array(), array $whitelist = array() )
    {
        $this->writer = $writer;

        foreach ( $blacklist as $property => $regexps )
        {
            $this->addToBlacklist( $property, $regexps );
        }

        foreach ( $whitelist as $property => $regexps )
        {
            $this->addToWhitelist( $property, $regexps );
        }
    }

    /**
     * Add to blacklist
     *
     * Add some regular expression matches to property blacklist. If the value
     * of the request property matches one of the regular expressions the
     * interaction in ignored.
     *
     * @param string $property
     * @param array $regexps
     * @return void
     */
    public function addToBlacklist( $property, array $regexps )
    {
        $this->blacklist[$property] = $regexps;
    }

    /**
     * Add to whitelist
     *
     * Add some regular expression matches to property whitelist. If the value
     * of the request property matches one of the regular expressions the
     * interaction in included.
     *
     * @param string $property
     * @param array $regexps
     * @return void
     */
    public function addToWhitelist( $property, array $regexps )
    {
        $this->whitelist[$property] = $regexps;
    }

    /**
     * Write HTTP interaction
     *
     * @param Struct\Interaction $interaction
     * @return void
     */
    public function write( Struct\Interaction $interaction )
    {
        if ( count( $this->whitelist ) )
        {
            // Check if a whitelist entry matches, then pass interaction on.
            foreach ( $this->whitelist as $property => $regexps )
            {
                foreach ( $regexps as $regexp )
                {
                    if ( preg_match( $regexp, $interaction->regexp->$property ) )
                    {
                        $this->writer->write( $interaction );
                        return;
                    }
                }
            }

            // If there are whitelist entries, but none matches, stop
            // processing.
            return;
        }

        // Abort if a blacklist entry matches
        foreach ( $this->blacklist as $property => $regexps )
        {
            foreach ( $regexps as $regexp )
            {
                if ( preg_match( $regexp, $interaction->request->$property ) )
                {
                    return;
                }
            }
        }

        $this->writer->write( $interaction );
    }
}

