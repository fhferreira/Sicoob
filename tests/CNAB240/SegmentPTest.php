<?php

namespace Sicoob\Tests\CNAB240;

use Sicoob\Remessa\Fields\Field;
use Sicoob\Remessa\CNAB240\SegmentP;
use PHPUnit_Framework_TestCase;

class SegmentPTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new SegmentP();
    }

    public function testEntity()
    {

        $this->assertInstanceOf(SegmentP::class, $this->object);
    }

    public function testRender()
    {
        $date = date('dmY', strtotime('+1 month'));
        $emissao = date('dmY');
        $data = [
            'num_cc_agencia_codigo' => '4321',
            'lote' => '0001',
            'registro_item' => '00001',
            'digito_verificador' => '4',
            'conta_corrente' => '162',
            'conta_corrente_dv' => '7',
            'nosso_numero' => '000000000001011',
            'carteira' => '1',
            'numero_documento' => '000000000000000',
            'data_vencimento' => $date,
            'data_emissao' => $emissao,
            'valor_nominal' => 100.15,
            'data_juros_mora' => $date,
        ];
        $this->object->fill($data);
        $line = $this->object->render();
        $this->assertContains("7560001300001P 010432140000000001627 000000000001011     10 11000000000000000{$date}00000000001001500000 02A{$emissao}0{$date}000000000000000000000000000000000000000000000000000000000000000000000                         0000   090000000000 ", $line);
    }

    public function testLineLength()
    {
        $this->assertEquals($this->object->size, strlen($this->object->render()));
    }

}