<?php

namespace Sicoob\Tests\CNAB240;

use Sicoob\Remessa\CNAB240\TrailerArquivo;
use PHPUnit_Framework_TestCase;

class TrailerArquivoTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new TrailerArquivo();
    }

    public function testEntity()
    {
        $this->assertInstanceOf(TrailerArquivo::class, $this->object);
    }

    public function testRender()
    {
        $emissao = date('dmY');
        $this->object->fill([
            'quantidade_lotes' => 1,
            'quantidade_registros' => 100
        ]);
        $output = "75699999         000001000100000000                                                                                                                                                                                                             ";
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