<?php

namespace Sicoob\Tests\CNAB240;

use Sicoob\Remessa\CNAB240\TrailerLote;
use PHPUnit_Framework_TestCase;

class TrailerLoteTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new TrailerLote();
    }

    public function testEntity()
    {
        $this->assertInstanceOf(TrailerLote::class, $this->object);
    }

    public function testRender()
    {
        $emissao = date('dmY');
        $this->object->fill([
            'lote' => 2,
            'quantidade_registros' => 105,
            'quantidade_titulos_simples' => 104,
            'valor_titulos_simples' => 10001.01
        ]);
        $output = "75600025         00010500010400000000001000101000000000000000000000000000000000000000000000000000000000000000000000                                                                                                                             ";
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