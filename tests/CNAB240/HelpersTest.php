<?php

namespace Sicoob\Tests\CNAB240;

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

}