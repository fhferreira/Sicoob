<?php

namespace Sicoob\Tests\Helper\CNAB240;

use Sicoob\Helpers\Helper;
use PHPUnit_Framework_TestCase;

class HelpersTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new Helper();
    }

    public function testEntity()
    {
        $this->assertInstanceOf(Helper::class, $this->object);
    }

    public function testCountBoletos() {


        $boletoNumber = 1;
        $count = $this->object->calculateRegister($boletoNumber, 'P');
        $this->assertEquals(1, $count);

        $count = $this->object->calculateRegister($boletoNumber, 'Q');
        $this->assertEquals(2, $count);

        $count = $this->object->calculateRegister($boletoNumber, 'R');
        $this->assertEquals(3, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'S');
        $this->assertEquals(4, $count);

        $boletoNumber = 2;
        $count = $this->object->calculateRegister($boletoNumber, 'P');
        $this->assertEquals(5, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'Q');
        $this->assertEquals(6, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'R');
        $this->assertEquals(7, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'S');
        $this->assertEquals(8, $count);

        $boletoNumber = 3;
        $count = $this->object->calculateRegister($boletoNumber, 'P');
        $this->assertEquals(9, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'Q');
        $this->assertEquals(10, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'R');
        $this->assertEquals(11, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'S');
        $this->assertEquals(12, $count);

        $boletoNumber = 4;
        $count = $this->object->calculateRegister($boletoNumber, 'P');
        $this->assertEquals(13, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'Q');
        $this->assertEquals(14, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'R');
        $this->assertEquals(15, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'S');
        $this->assertEquals(16, $count);

        $boletoNumber = 5;
        $count = $this->object->calculateRegister($boletoNumber, 'P');
        $this->assertEquals(17, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'Q');
        $this->assertEquals(18, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'R');
        $this->assertEquals(19, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'S');
        $this->assertEquals(20, $count);

        $boletoNumber = 6;
        $count = $this->object->calculateRegister($boletoNumber, 'P');
        $this->assertEquals(21, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'Q');
        $this->assertEquals(22, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'R');
        $this->assertEquals(23, $count);
        $count = $this->object->calculateRegister($boletoNumber, 'S');
        $this->assertEquals(24, $count);
    }

    public function testCalculateInterval()
    {
        $positions = Helper::calculateStartAndLength(1, 10);
        $this->assertEquals(0, $positions['start']);
        $this->assertEquals(10, $positions['length']);

        $positions = Helper::calculateStartAndLength(15, 21);
        $this->assertEquals(14, $positions['start']);
        $this->assertEquals(7, $positions['length']);
    }

    public function testCutInterval()
    {
        $string = "7560001300001P 010432140000000001627 000000000001011     10 112016120712001  0712201600000000000000100000 02A07112016007112016000000000000000000000000000000000000000000000000000000000000000000000                         1000   090000000000 ";
        $result = Helper::cutInterval($string, 1, 3);
        $this->assertEquals('756', $result);

        $result = Helper::cutInterval($string, 4, 7);
        $this->assertEquals('0001', $result);

        $result = Helper::cutInterval($string, 8, 8);
        $this->assertEquals('3', $result);

        $result = Helper::cutInterval($string, 9, 13);
        $this->assertEquals('00001', $result);

        $result = Helper::cutInterval($string, 14, 14);
        $this->assertEquals('P', $result);

        $result = Helper::cutInterval($string, 15, 15);
        $this->assertEquals(' ', $result);
    }

}