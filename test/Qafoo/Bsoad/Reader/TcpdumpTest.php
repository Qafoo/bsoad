<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad\Reader;
use Qafoo\Bsoad\ParserFactory;
use Qafoo\Bsoad\Writer;
use Qafoo\Bsoad\Sorter;

/**
 * @version $Revision$
 *
 * @covers \Qafoo\Bsoad\Reader\Tcpdump
 * @group unittest
 */
class TcpdumpTest extends \PHPUnit_Framework_TestCase
{
    public static function getDumps()
    {
        return array(
            array(
                $file = __DIR__ . '/_fixtures/tcpdump_stream.bin',
                $file . '.php',
            ),
            array(
                $file = __DIR__ . '/_fixtures/tcpdump_stream_http_1_0.bin',
                $file . '.php',
            ),
            array(
                $file = __DIR__ . '/_fixtures/tcpdump_stream_ipv6.bin',
                $file . '.php',
            ),
        );
    }

    /**
     * @dataProvider getDumps
     */
    public function testParseStream( $dump, $interactions )
    {
        $reader = new Tcpdump(
            new Sorter\Basic(
                new ParserFactory\Http(
                    $writer = new Writer\Aggregate()
                )
            )
        );

        $reader->process(
            fopen( $dump, 'r' )
        );

        if ( file_exists( $interactions ) )
        {
            $interactions = include $interactions;
        }
        else
        {
            $interactions = array();
            file_put_contents( $dump . '.dump.php', "<?php\n\nreturn " . var_export( $writer->getInteractions(), true ) . ";\n\n" );
        }

        $this->assertEquals(
            $interactions,
            $writer->getInteractions()
        );
    }
}
