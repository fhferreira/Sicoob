<?php

namespace Sicoob\Tests\CNAB240;

use Sicoob\Remessa\CNAB240\SegmentQ;
use PHPUnit_Framework_TestCase;

class SegmentQTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new SegmentQ();
    }

    public function testEntity()
    {

        $this->assertInstanceOf(SegmentQ::class, $this->object);
    }

    public function testRender()
    {
        $date = date('dmY', strtotime('+1 month'));
        $emissao = date('dmY');
        $data = [
            'lote' => '0001',
            'registro_item' => '00001',
        ];
        $this->object->fill($data);
        $line = $this->object->render();
        $this->assertContains("7560001", $line);
        $this->assertContains("75600013", $line);
        $this->assertContains("7560001300001", $line);
        $this->assertContains("7560001300001Q", $line);



    }

    public function testLineLength()
    {
        //$this->assertEquals($this->object->size, strlen($this->object->render()));
    }

}