<?php

namespace Sicoob\Tests\CNAB240;

use Sicoob\Remessa\CNAB240\SegmentR;
use PHPUnit_Framework_TestCase;

class SegmentRTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new SegmentR();
    }

    public function testEntity()
    {

        $this->assertInstanceOf(SegmentR::class, $this->object);
    }

    public function testRender()
    {
        $date = date('dmY', strtotime('+1 month'));
        $emissao = date('dmY');
        $data = [
            'lote' => '0001',
            'registro_item' => '00001',
            'informacao_3' => 'Mensagem 3 pagamento ate a data',
            'informacao_4' => 'Mensagem 4 pagamento ate a data',
        ];
        $this->object->fill($data);
        $line = $this->object->render();
        $expected = "7560001300001R 01000000000000000000000000";
        $this->assertContains($expected, $line);
        $expected = "000000000000000000000000";
        $this->assertContains($expected, $line);
        $expected = "000000000000000000000000";
        $this->assertContains($expected, $line);
        $expected = "          ";
        $this->assertContains($expected, $line);
        $expected .= "MENSAGEM 3 PAGAMENTO ATE A DATA         ";
        $this->assertContains($expected, $line);
        $expected .= "MENSAGEM 4 PAGAMENTO ATE A DATA         ";
        $this->assertContains($expected, $line);
        $expected .= "                    ";
        $this->assertContains($expected, $line);
        $expected .= "00000000";
        $this->assertContains($expected, $line);
        $expected .= "000";
        $this->assertContains($expected, $line);
        $expected .= "00000";
        $this->assertContains($expected, $line);
        $expected .= " 000000000000  0         ";
        $this->assertContains($expected, $line);
    }

    public function testLineLength()
    {
        $this->assertEquals(
            $this->object->size,
            strlen($this->object->render())
        );
    }

}