<?php

namespace Sicoob\Tests\Remessa\CNAB240;

use Sicoob\Remessa\CNAB240\HeaderLote;
use PHPUnit_Framework_TestCase;

class HeaderLoteTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new HeaderLote();
    }

    public function testEntity()
    {
        $this->assertInstanceOf(HeaderLote::class, $this->object);
    }

    public function testRender()
    {
        $emissao = date('dmY');
        $this->object->fill([
            'lote' => 2,
            'inscricao' => 2,
            'numero_inscricao' => '12314712000100',
            'nome_empresa' => 'Funeraria Nova Franca LTDA',
            'agencia_cooperativa' => 1234,
            'dv_prefixo' => 1,
            'conta_corrente' => 123,
            'dv_conta_corrente' => 7,
            'data_gravacao' => $emissao,
        ]);

        $output = "75600021R01  040 2012314712000100                    0123410000000001237 FUNERARIA NOVA FRANCA LTDA                                                                                    00000000{$emissao}00000000                                 ";
        $line = $this->object->render();
        $this->assertEquals($output, $line);
    }

    public function testSize()
    {
        $this->assertEquals(
            $this->object->size,
            strlen($this->object->render())
        );
    }
}