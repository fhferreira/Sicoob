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
            'nome' => 'FLAVIO HENRIQUE FERREIRA',
            'endereco' => 'RUA SEBASTIAO MARTINS 80',
            'bairro' => 'Jardim Pedreiras',
            'CEP' => '14430',
            'sufixo_CEP' => '000',
            'cidade' => 'Restinga',
            'uf' => 'SP',
        ];
        $this->object->fill($data);
        $line = $this->object->render();
        $this->assertContains("7560001", $line);
        $this->assertContains("75600013", $line);
        $this->assertContains("7560001300001", $line);
        $this->assertContains("7560001300001Q", $line);
        $this->assertContains("7560001300001Q ", $line);
        $this->assertContains("7560001300001Q 01", $line);
        $this->assertContains("7560001300001Q 011", $line);
        $this->assertContains("7560001300001Q 011000000000000000", $line);
        $this->assertContains("7560001300001Q 011000000000000000FLAVIO HENRIQUE FERREIRA                RUA SEBASTIAO MARTINS 80                JARDIM PEDREIRA14430000       RESTINGASP1000000000000000                                        000                            ", $line);
    }

    public function testLineLength()
    {
        $this->assertEquals($this->object->size, strlen($this->object->render()));
    }

}