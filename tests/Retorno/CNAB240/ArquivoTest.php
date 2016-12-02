<?php

namespace Sicoob\Tests\Retorno\CNAB240;

use PHPUnit_Framework_TestCase;
use PHPUnit_Framework_Constraint_IsType;
use Sicoob\Retorno\CNAB240\Arquivo;

class ArquivoTest extends PHPUnit_Framework_TestCase
{

    public $object;
    public $filename;
    public $path;

    public function setUp()
    {
        $this->object = new Arquivo();
        $this->path = __DIR__;
    }

    public function testException()
    {
        $this->filename = null;
        $this->setExpectedException('Exception', "O Arquivo não foi encontrado ou o caminho informado está inválido.");
        $this->object->fill($this->filename);
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf(Arquivo::class, $this->object);
    }

    public function testFileExists()
    {
        $this->filename = $this->path . '/../../fixtures/2016-11-08.ret';
        $this->object->fill($this->filename);
        $this->assertFileExists($this->object->filename);
    }

    public function testParse()
    {
        $this->filename = $this->path . '/../../fixtures/2016-11-08.ret';
        $this->object->fill($this->filename);
        foreach($this->object->boletos as $k => $boleto) {
            $this->assertEquals(0.00, $boleto->valor);
            $this->assertEquals('02', $boleto->segmentT->fields['codigo_movimento_retorno']->value);
        }
    }

    public function testParseEntradaBoletos()
    {
        $this->filename = $this->path . '/../../fixtures/2016-11-09.ret';
        $this->object->fill($this->filename);
        foreach($this->object->boletos as $k => $boleto) {
            $this->assertEquals(0.01, $boleto->valor);
            $this->assertEquals('06', $boleto->segmentT->fields['codigo_movimento_retorno']->value);
        }
    }
}