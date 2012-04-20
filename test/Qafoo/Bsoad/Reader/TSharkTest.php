<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Reader;

/**
 * @version $Revision$
 *
 * @covers \Qafoo\Bsoad\Reader\TShark
 * @group unittest
 */
class TSharkTest extends \PHPUnit_Framework_TestCase
{
    public function testExtracktPacketTimestamp()
    {
        $reader = new TShark(
        );

        $reader->process(
            fopen( __DIR__ . '/_fixtures/tshark_dump.pdml', 'r' )
        );
    }
}
