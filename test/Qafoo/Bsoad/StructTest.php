<?php
/**
 * This file is part of Bsoad
 *
 * @version $Revision$
 * @license https://www.gnu.org/licenses/agpl-3.0.txt AGPL
 */

namespace Qafoo\Bsoad;

class Example extends Struct
{
    public $property;
}

/**
 * @version $Revision$
 *
 * @covers \Qafoo\Bsoad\Struct
 * @group unittest
 */
class StructTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \UnexpectedValueException
     */
    public function testGetUnknownProperty()
    {
        $struct = new Example();
        $struct->unknownProperty;
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testSetUnknownProperty()
    {
        $struct = new Example();
        $struct->unknownProperty = 42;
    }

    public function testSetAndgetProperty()
    {
        $struct = new Example();
        $struct->property = 42;

        $this->assertSame( 42, $struct->property );
    }

    public function testCloneSimple()
    {
        $struct = new Example();
        $struct->property = 42;

        $this->assertNotSame( $struct, clone $struct );
        $this->assertEquals( $struct, clone $struct );
    }

    public function testCloneComplex()
    {
        $struct = new Example();
        $struct->property = (object) array( 'foo' => 'bar' );

        $this->assertNotSame( $struct, clone $struct );
        $this->assertEquals( $struct, clone $struct );
    }

    public function testVarExport()
    {
        $struct = new Example();
        $struct->property = array( 'foo' => 'bar' );

        $reImported = eval( 'return ' . var_export( $struct, true ) . ';' );

        $this->assertNotSame( $struct, $reImported );
        $this->assertEquals( $struct, $reImported );
    }
}
