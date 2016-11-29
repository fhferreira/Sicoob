<?php

namespace Sicoob\Tests\Remessa\CNAB240;

use Sicoob\Remessa\CNAB240\SegmentS;
use PHPUnit_Framework_TestCase;

class SegmentSTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new SegmentS();
    }

    public function testEntity()
    {

        $this->assertInstanceOf(SegmentS::class, $this->object);
    }

    public function testRender()
    {
        $data = [
            'lote' => '0001',
            'registro_item' => '00001',
            'informacao_5' => 'Telefones para Contato: (16) 3403-3000',
            'informacao_6' => 'Quer um cobrador, entre em contato',
            'informacao_7' => 'Pagavel até o dia o ultimo dia do mes',
            'informacao_8' => 'de vencimento',
            'informacao_9' => 'Site: www.novafranca.com.br',
        ];
        $this->object->fill($data);
        $line = $this->object->render();
        $expected = "756" .
            "0001" .
            "3" .
            "00001" .
            "S" .
            " " .
            "01" .
            "3" .
            "TELEFONES PARA CONTATO: (16) 3403-3000  " .
            "QUER UM COBRADOR, ENTRE EM CONTATO      " .
            "PAGAVEL ATE O DIA O ULTIMO DIA DO MES   " .
            "DE VENCIMENTO                           " .
            "SITE: WWW.NOVAFRANCA.COM.BR             " .
            "                      ";
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