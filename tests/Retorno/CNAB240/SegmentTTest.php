<?php

namespace Sicoob\Tests\Retorno\CNAB240;

use PHPUnit_Framework_TestCase;
use PHPUnit_Framework_Constraint_IsType;
use Sicoob\Retorno\CNAB240\SegmentT;

class SegmentTTest extends PHPUnit_Framework_TestCase
{

    public $object;
    public $lineRaw;

    public function setUp()
    {
        $this->object = new SegmentT();
        $this->lineRaw = "7560001300001T 0201234000000000012470000004204401011     120170110300000010012017000000000008800756012340                         091000040207471234THAIS MARINAN TEIXERA                   0000000000000000000000000                           ";
        $this->object->fill($this->lineRaw);
    }

    public function testLineLength()
    {
        $this->assertEquals(240, strlen($this->lineRaw));
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf(SegmentT::class, $this->object);
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
        $this->assertEquals('00001', $this->object->fields['sequencial']->value);
        $this->assertEquals('T', $this->object->fields['segmento']->value);
        $this->assertEquals(' ', $this->object->fields['cnab_1']->value);
        $this->assertEquals('02', $this->object->fields['codigo_movimento_retorno']->value);
        $this->assertEquals('Entrada Confirmada', $this->object->fields['codigo_movimento_retorno']->getValueIndex());
        $this->assertEquals('01234', $this->object->fields['agencia']->value);
        $this->assertEquals('0', $this->object->fields['agencia_dv']->value);
        $this->assertEquals('000000000124', $this->object->fields['conta_corrente']->value);
        $this->assertEquals('7', $this->object->fields['conta_corrente_dv']->value);
        $this->assertEquals('0', $this->object->fields['dv_agencia_conta']->value);
        $this->assertCount(5, $this->object->fields['nosso_numero']->value);
        $this->assertEquals('0000042044', $this->object->fields['nosso_numero']->value['numTitulo']);
        $this->assertEquals('01', $this->object->fields['nosso_numero']->value['parcela']);
        $this->assertEquals('01', $this->object->fields['nosso_numero']->value['modalidade']);
        $this->assertEquals('1', $this->object->fields['nosso_numero']->value['tipo_formulario']);
        $this->assertEquals('     ', $this->object->fields['nosso_numero']->value['brancos']);
        $this->assertEquals('1', $this->object->fields['carteira']->value);
        $this->assertEquals('201701103000000', $this->object->fields['numero_documento']->value);
        $this->assertEquals('10/01/2017', $this->object->fields['data_vencimento']->value);
        $this->assertEquals('10012017', $this->object->fields['data_vencimento']->rawValue);
        $this->assertEquals('000000000008800', $this->object->fields['valor_nominal']->rawValue);
        $this->assertEquals('88.00', $this->object->fields['valor_nominal']->value);
        $this->assertEquals('756', $this->object->fields['banco_cobrador']->value);
        $this->assertEquals('01234', $this->object->fields['agencia_cobradora']->value);
        $this->assertEquals('0', $this->object->fields['dv_agencia_cobradora']->value);
        $this->assertEquals('                         ', $this->object->fields['identificao_titulo']->value);
        $this->assertEquals('09', $this->object->fields['codigo_moeda']->value);
        $this->assertEquals('Real', $this->object->fields['codigo_moeda']->getValueIndex());
        $this->assertEquals('1', $this->object->fields['tipo_inscricao']->value);
        $this->assertEquals('000040207471234', $this->object->fields['numero_inscricao']->value);
        $this->assertEquals('THAIS MARINAN TEIXERA                   ', $this->object->fields['nome_pagador']->value);
    }

}