<?php

namespace Sicoob\Tests\Retorno\CNAB240;

use PHPUnit_Framework_TestCase;
use PHPUnit_Framework_Constraint_IsType;
use Sicoob\Retorno\CNAB240\SegmentU;

class SegmentUTest extends PHPUnit_Framework_TestCase
{

    public $object;
    public $lineRaw;

    public function setUp()
    {
        $this->object = new SegmentU();
        $this->lineRaw = "7560001300002U 020000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000002511201600000000    00000000000000000000000                              75600000000000000000000       ";
        $this->object->fill($this->lineRaw);
    }

    public function testLineLength()
    {
        $this->assertEquals(240, strlen($this->lineRaw));
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf(SegmentU::class, $this->object);
    }

    public function testFieldsTypeAndLength()
    {
        foreach($this->object->fields as $field) {
            if (!in_array($field->type, ['money', 'array', 'date'])) {
                $this->assertEquals(strlen($field->value), $field->length);
                //var_dump($field->name, $field->value, $field->length);
            } else if ($field->type == 'array') {
                $this->assertInternalType(PHPUnit_Framework_Constraint_IsType::TYPE_ARRAY, $field->value);
            } else if ($field->type == 'money') {
                $this->assertInternalType(PHPUnit_Framework_Constraint_IsType::TYPE_FLOAT, $field->value);
            } else if ($field->type == 'date') {
                $this->assertEquals(strlen($field->value), $field->length + 2);
            }
        }
    }

    public function testFields()
    {
        $this->assertEquals('756', $this->object->fields['banco']->value);
        $this->assertEquals('0001', $this->object->fields['lote']->value);
        $this->assertEquals('3', $this->object->fields['tipo_registro']->value);
        $this->assertEquals('00002', $this->object->fields['sequencial']->value);
        $this->assertEquals('U', $this->object->fields['segmento']->value);
        $this->assertEquals(' ', $this->object->fields['cnab_1']->value);
        $this->assertEquals('02', $this->object->fields['codigo_movimento_retorno']->value);
        $this->assertEquals('Entrada Confirmada', $this->object->fields['codigo_movimento_retorno']->getValueIndex());
        $this->assertEquals(0.0, $this->object->fields['valor_juros']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_descontos']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_abatimento_ou_cancelados']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_iof']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_pago']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_liquido']->value);
    }

    public function testFieldsRejeitada()
    {
        $line = '7560001300002U 030000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000002311201600000000    00000000000000000000000                              75600000000000000000000       ';
        $this->object->fill($line);
        $this->assertEquals('756', $this->object->fields['banco']->value);
        $this->assertEquals('0001', $this->object->fields['lote']->value);
        $this->assertEquals('3', $this->object->fields['tipo_registro']->value);
        $this->assertEquals('00002', $this->object->fields['sequencial']->value);
        $this->assertEquals('U', $this->object->fields['segmento']->value);
        $this->assertEquals(' ', $this->object->fields['cnab_1']->value);
        $this->assertEquals('03', $this->object->fields['codigo_movimento_retorno']->value);
        $this->assertEquals('Entrada Rejeitada', $this->object->fields['codigo_movimento_retorno']->getValueIndex());
        $this->assertEquals(0.0, $this->object->fields['valor_juros']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_descontos']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_abatimento_ou_cancelados']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_iof']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_pago']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_liquido']->value);
    }

    public function testFieldsPago()
    {
        $line = '7560001300002U 060000000000000000000000000000000000000000000000000000000000000000000000000010000000000000010000000000000000000000000000000911201609112016    00000000000000000000000                              75600000000000000000000       ';
        $this->object->fill($line);
        $this->assertEquals('756', $this->object->fields['banco']->value);
        $this->assertEquals('0001', $this->object->fields['lote']->value);
        $this->assertEquals('3', $this->object->fields['tipo_registro']->value);
        $this->assertEquals('00002', $this->object->fields['sequencial']->value);
        $this->assertEquals('U', $this->object->fields['segmento']->value);
        $this->assertEquals(' ', $this->object->fields['cnab_1']->value);
        $this->assertEquals('06', $this->object->fields['codigo_movimento_retorno']->value);
        $this->assertEquals('Liquidação', $this->object->fields['codigo_movimento_retorno']->getValueIndex());
        $this->assertEquals(0.0, $this->object->fields['valor_juros']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_descontos']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_abatimento_ou_cancelados']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_iof']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_pago']->value);
        $this->assertEquals(0.01, $this->object->fields['valor_liquido']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_efetivo_despesas']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_efetivo_creditos']->value);
        $this->assertEquals('09/11/2016', $this->object->fields['data_evento']->value);
        $this->assertEquals('    ', $this->object->fields['ocorrencia_pagador']->value);
        $this->assertEquals('00/00/0000', $this->object->fields['data_ocorrencia']->value);
        $this->assertEquals(0.0, $this->object->fields['valor_ocorrencia']->value);
        $this->assertEquals('                              ', $this->object->fields['compl_ocorrencia']->value);
        $this->assertEquals(756, $this->object->fields['banco_correspondente']->value);
        $this->assertEquals('00000000000000000000', $this->object->fields['numero_banco_correspondente']->value);
        $this->assertEquals('       ', $this->object->fields['cnab_2']->value);
    }

}