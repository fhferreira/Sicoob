<?php

namespace Sicoob\Tests\Retorno\CNAB240;

use PHPUnit_Framework_TestCase;
use PHPUnit_Framework_Constraint_IsType;
use Sicoob\Retorno\CNAB240\Boleto;

class BoletoTest extends PHPUnit_Framework_TestCase
{

    public $object;
    public $lineTRaw;
    public $lineURaw;

    public function setUp()
    {
        $this->object = new Boleto();
        $this->lineTRaw = "7560001300001T 0601234000000000012370000000101401011     12016120712001  07122016000000000000001001029910                         091000011111111111FLAVIO HENRIQUE FERREIRA                00000000000000000000001900000000004                 ";
        $this->lineURaw = "7560001300002U 060000000000000000000000000000000000000000000000000000000000000000000000000010000000000000010000000000000000000000000000000911201609112016    00000000000000000000000                              75600000000000000000000       ";
        $this->object->fill($this->lineTRaw, $this->lineURaw);
    }

    public function testLineLength()
    {
        $this->assertEquals(240, strlen($this->lineTRaw));
        $this->assertEquals(240, strlen($this->lineURaw));
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf(Boleto::class, $this->object);
    }

    public function testFieldsTypeAndLength()
    {
        foreach ($this->object->segmentT->fields as $field) {
            if (!in_array($field->type, ['money', 'array', 'date'])) {
                $this->assertEquals(strlen($field->value), $field->length);
                //var_dump($field->name, $field->value, $field->length);
            } else {
                if ($field->type == 'array') {
                    $this->assertInternalType(PHPUnit_Framework_Constraint_IsType::TYPE_ARRAY, $field->value);
                } else {
                    if ($field->type == 'money') {
                        $this->assertInternalType(PHPUnit_Framework_Constraint_IsType::TYPE_FLOAT, $field->value);
                    } else {
                        if ($field->type == 'date') {
                            $this->assertEquals(strlen($field->value), $field->length + 2);
                        }
                    }
                }
            }
        }

        foreach ($this->object->segmentU->fields as $field) {
            if (!in_array($field->type, ['money', 'array', 'date'])) {
                $this->assertEquals(strlen($field->value), $field->length);
                //var_dump($field->name, $field->value, $field->length);
            } else {
                if ($field->type == 'array') {
                    $this->assertInternalType(PHPUnit_Framework_Constraint_IsType::TYPE_ARRAY, $field->value);
                } else {
                    if ($field->type == 'money') {
                        $this->assertInternalType(PHPUnit_Framework_Constraint_IsType::TYPE_FLOAT, $field->value);
                    } else {
                        if ($field->type == 'date') {
                            $this->assertEquals(strlen($field->value), $field->length + 2);
                        }
                    }
                }
            }
        }
    }

    public function testFieldsPago()
    {
        $this->assertEquals('756', $this->object->segmentT->fields['banco']->value);
        $this->assertEquals('0001', $this->object->segmentT->fields['lote']->value);
        $this->assertEquals('3', $this->object->segmentT->fields['tipo_registro']->value);
        $this->assertEquals('00001', $this->object->segmentT->fields['sequencial']->value);
        $this->assertEquals('T', $this->object->segmentT->fields['segmento']->value);
        $this->assertEquals(' ', $this->object->segmentT->fields['cnab_1']->value);
        $this->assertEquals('06', $this->object->segmentT->fields['codigo_movimento_retorno']->value);
        $this->assertEquals('Liquidação', $this->object->segmentT->fields['codigo_movimento_retorno']->getValueIndex());
        $this->assertEquals('01234', $this->object->segmentT->fields['agencia']->value);
        $this->assertEquals('0', $this->object->segmentT->fields['agencia_dv']->value);
        $this->assertEquals('000000000123', $this->object->segmentT->fields['conta_corrente']->value);
        $this->assertEquals('7', $this->object->segmentT->fields['conta_corrente_dv']->value);
        $this->assertEquals('0', $this->object->segmentT->fields['dv_agencia_conta']->value);
        $this->assertCount(5, $this->object->segmentT->fields['nosso_numero']->value);
        $this->assertEquals('0000001014', $this->object->segmentT->fields['nosso_numero']->value['numTitulo']);
        $this->assertEquals('01', $this->object->segmentT->fields['nosso_numero']->value['parcela']);
        $this->assertEquals('01', $this->object->segmentT->fields['nosso_numero']->value['modalidade']);
        $this->assertEquals('1', $this->object->segmentT->fields['nosso_numero']->value['tipo_formulario']);
        $this->assertEquals('     ', $this->object->segmentT->fields['nosso_numero']->value['brancos']);
        $this->assertEquals('1', $this->object->segmentT->fields['carteira']->value);
        $this->assertEquals('2016120712001  ', $this->object->segmentT->fields['numero_documento']->value);
        $this->assertEquals('07/12/2016', $this->object->segmentT->fields['data_vencimento']->value);
        $this->assertEquals('07122016', $this->object->segmentT->fields['data_vencimento']->rawValue);
        $this->assertEquals('000000000000001', $this->object->segmentT->fields['valor_nominal']->rawValue);
        $this->assertEquals('0.01', $this->object->segmentT->fields['valor_nominal']->value);
        $this->assertEquals('001', $this->object->segmentT->fields['banco_cobrador']->value);
        $this->assertEquals('02991', $this->object->segmentT->fields['agencia_cobradora']->value);
        $this->assertEquals('0', $this->object->segmentT->fields['dv_agencia_cobradora']->value);
        $this->assertEquals('                         ', $this->object->segmentT->fields['identificao_titulo']->value);
        $this->assertEquals('09', $this->object->segmentT->fields['codigo_moeda']->value);
        $this->assertEquals('Real', $this->object->segmentT->fields['codigo_moeda']->getValueIndex());
        $this->assertEquals('1', $this->object->segmentT->fields['tipo_inscricao']->value);
        $this->assertEquals('000011111111111', $this->object->segmentT->fields['numero_inscricao']->value);
        $this->assertEquals('FLAVIO HENRIQUE FERREIRA                ', $this->object->segmentT->fields['nome_pagador']->value);
        $this->assertEquals('0000000000', $this->object->segmentT->fields['numero_contrato']->value);
        $this->assertEquals('1.90', $this->object->segmentT->fields['valor_tarifa_custas']->value);
        $this->assertEquals('000000000000190', $this->object->segmentT->fields['valor_tarifa_custas']->rawValue);
        $this->assertEquals('0000000004', $this->object->segmentT->fields['motivo_ocorrencia']->value);
        $this->assertEquals('                 ', $this->object->segmentT->fields['cnab_2']->value);

        $this->assertEquals('756', $this->object->segmentU->fields['banco']->value);
        $this->assertEquals('0001', $this->object->segmentU->fields['lote']->value);
        $this->assertEquals('3', $this->object->segmentU->fields['tipo_registro']->value);
        $this->assertEquals('00002', $this->object->segmentU->fields['sequencial']->value);
        $this->assertEquals('U', $this->object->segmentU->fields['segmento']->value);
        $this->assertEquals(' ', $this->object->segmentU->fields['cnab_1']->value);
        $this->assertEquals('06', $this->object->segmentU->fields['codigo_movimento_retorno']->value);
        $this->assertEquals('Liquidação', $this->object->segmentU->fields['codigo_movimento_retorno']->getValueIndex());
        $this->assertEquals(0.0, $this->object->segmentU->fields['valor_juros']->value);
        $this->assertEquals(0.0, $this->object->segmentU->fields['valor_descontos']->value);
        $this->assertEquals(0.0, $this->object->segmentU->fields['valor_abatimento_ou_cancelados']->value);
        $this->assertEquals(0.0, $this->object->segmentU->fields['valor_iof']->value);
        $this->assertEquals(0.0, $this->object->segmentU->fields['valor_pago']->value);
        $this->assertEquals(0.01, $this->object->segmentU->fields['valor_liquido']->value);
        $this->assertEquals(0.0, $this->object->segmentU->fields['valor_efetivo_despesas']->value);
        $this->assertEquals(0.0, $this->object->segmentU->fields['valor_efetivo_creditos']->value);
        $this->assertEquals('09/11/2016', $this->object->segmentU->fields['data_evento']->value);
        $this->assertEquals('    ', $this->object->segmentU->fields['ocorrencia_pagador']->value);
        $this->assertEquals('00/00/0000', $this->object->segmentU->fields['data_ocorrencia']->value);
        $this->assertEquals(0.0, $this->object->segmentU->fields['valor_ocorrencia']->value);
        $this->assertEquals('                              ',
            $this->object->segmentU->fields['compl_ocorrencia']->value);
        $this->assertEquals(756, $this->object->segmentU->fields['banco_correspondente']->value);
        $this->assertEquals('00000000000000000000',
            $this->object->segmentU->fields['numero_banco_correspondente']->value);
        $this->assertEquals('       ', $this->object->segmentU->fields['cnab_2']->value);
    }

}