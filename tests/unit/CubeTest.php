<?php

use App\Cube;

class CubeTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @covers            \App\Cube::__construct
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForNullConstructorArguments()
    {
        new Cube(null);
    }

    /**
     * @covers            \App\Cube::__construct
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidConstructorTypeOfArguments()
    {
        new Cube('1');
    }

    /**
     * @covers            \App\Cube::__construct
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForArgumentsBelowTheValidRange()
    {
        new Cube(0);
    }

    /**
     * @covers            \App\Cube::__construct
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForArgumentsAboveTheValidRange()
    {
        new Cube(101);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidUpdateWTypeOfArgument()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 'a');
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidUpdateZTypeOfArgument()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 'a', 4);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidUpdateYTypeOfArgument()
    {
        $cube = new Cube(3);
        $cube->update(2, 'a', 2, 4);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidUpdateXTypeOfArgument()
    {
        $cube = new Cube(3);
        $cube->update(2, 'a', 2, 4);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForXArgumentBelowTheValidRangeOnUpdate()
    {
        $cube = new Cube(3);
        $cube->update(0, 2, 2, 4);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForXArgumentAboveTheValidRangeOnUpdate()
    {
        $cube = new Cube(3);
        $cube->update(4, 2, 2, 4);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForYArgumentBelowTheValidRangeOnUpdate()
    {
        $cube = new Cube(3);
        $cube->update(2, 0, 2, 4);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForYArgumentAboveTheValidRangeOnUpdate()
    {
        $cube = new Cube(3);
        $cube->update(2, 4, 2, 4);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForZArgumentBelowTheValidRangeOnUpdate()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 0, 4);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForZArgumentAboveTheValidRangeOnUpdate()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 4, 4);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForWArgumentBelowTheValidRangeOnUpdate()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, -1000000001);
    }

    /**
     * @covers            \App\Cube::update
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForWArgumentAboveTheValidRangeOnUpdate()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 1000000001);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidQueryX1TypeOfArgument()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query('a', 2, 2, 2, 2, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidQueryY1TypeOfArgument()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 'a', 2, 2, 2, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidQueryZ1TypeOfArgument()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 'a', 2, 2, 2);
    }


    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidQueryX2TypeOfArgument()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 2, 'a', 2, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidQueryY2TypeOfArgument()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 2, 2, 'a', 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForInvalidQueryZ2TypeOfArgument()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 2, 2, 2, 'a');
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForX1ArgumentBelowTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(0, 2, 2, 2, 2, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForX1ArgumentAboveTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(4, 2, 2, 2, 2, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForY1ArgumentBelowTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 0, 2, 2, 2, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForY1ArgumentAboveTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 4, 2, 2, 2, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForZ1ArgumentBelowTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 0, 2, 2, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForZ1ArgumentAboveTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 4, 2, 2, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForX2ArgumentBelowTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 2, 1, 2, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForX2ArgumentAboveTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 2, 4, 2, 2);
    }


    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForY2ArgumentBelowTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 2, 2, 1, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForY2ArgumentAboveTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 2, 2, 4, 2);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForZ2ArgumentBelowTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 2, 2, 2, 1);
    }

    /**
     * @covers            \App\Cube::query
     * @uses              \App\Cube
     * @expectedException \InvalidArgumentException
     */
    public function testExceptionIsRaisedForZ2ArgumentAboveTheValidRangeOnQuery()
    {
        $cube = new Cube(3);
        $cube->update(2, 2, 2, 4);
        $cube->query(2, 2, 2, 2, 2, 4);
    }

    /**
     * @uses              \App\Cube
     */
    public function testFirstScenario()
    {
        $cube = new Cube(4);
        $cube->update(2, 2, 2, 4);
        $this->assertEquals(4, $cube->query(1, 1, 1, 3, 3, 3));
        $cube->update(1, 1, 1, 23);
        $this->assertEquals(4, $cube->query(2, 2, 2, 4, 4, 4));
        $this->assertEquals(27, $cube->query(1, 1, 1, 3, 3, 3));
    }

    /**
     * @uses              \App\Cube
     */
    public function testSecondScenario()
    {
        $cube = new Cube(2);
        $cube->update(2, 2, 2, 1);
        $this->assertEquals(0, $cube->query(1, 1, 1, 1, 1, 1));
        $this->assertEquals(1, $cube->query(1, 1, 1, 2, 2, 2));
        $this->assertEquals(1, $cube->query(2, 2, 2, 2, 2, 2));
    }


}
