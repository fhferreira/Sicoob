<?php

namespace Sicoob\Tests\Remessa\CNAB240;

use Sicoob\Remessa\CNAB240\HeaderArquivo;
use PHPUnit_Framework_TestCase;

class HeaderArquivoTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new HeaderArquivo();
    }

    public function testEntity()
    {
        $this->assertInstanceOf(HeaderArquivo::class, $this->object);
    }

    public function testRender()
    {
        $emissao = date('dmY');
        $hora = date('Hsi');
        $this->object->fill([
            'inscricao' => 2,
            'numero_inscricao' => '12314712000100',
            'nome_empresa' => 'Funeraria Nova Franca LTDA',
            'agencia_cooperativa' => 1234,
            'dv_prefixo' => 1,
            'conta_corrente' => 123,
            'dv_conta_corrente' => 7,
            'data_geracao' => $emissao,
            'hora_geracao' => $hora,
        ]);

        $output = "75600010         212314712000100                    0123410000000001237 FUNERARIA NOVA FRANCA LTDA    SICOOB                                  1{$emissao}{$hora}00000108100000                                                                     ";
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