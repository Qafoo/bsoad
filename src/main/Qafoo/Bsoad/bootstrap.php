<?php
/**
 * This file is part of Titio
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad;

// @codeCoverageIgnoreStart
// @codingStandardsIgnoreStart

// require __DIR__ . '/../../../library/.composer/autoload.php';

spl_autoload_register(
    function ( $class )
    {
        if ( 0 === strpos( $class, __NAMESPACE__ ) )
        {
            include __DIR__ . '/../../' . strtr( $class, '\\', '/' ) . '.php';
        }
    }
);

// @codingStandardsIgnoreEnd
// @codeCoverageIgnoreEnd
