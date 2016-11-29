<?php

namespace Sicoob\Tests\Remessa\CNAB240;

use Sicoob\Remessa\CNAB240\Arquivo;
use PHPUnit_Framework_TestCase;
use Sicoob\Remessa\CNAB240\Boleto;

class ArquivoTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new Arquivo();
    }

    public function testEntity()
    {
        $this->assertInstanceOf(Arquivo::class, $this->object);
    }

    public function testRender()
    {
        $emissao = date('dmY');
        $hora = date('Hsi');
        $lote = 1;
        $inscricao = 2;
        $numero_inscricao = '12314712000100';
        $nome_empresa = 'Funeraria Nova Franca LTDA';
        $agencia_cooperativa =  1234;
        $dv_prefixo = 1;
        $conta_corrente = 123;
        $dv_conta_corrente = 7;

        $this->object->fill([
            'lote'  => $lote,
            'header' => [
                'inscricao' => $inscricao,
                'numero_inscricao' => $numero_inscricao,
                'nome_empresa' => $nome_empresa,
                'agencia_cooperativa' => $agencia_cooperativa,
                'dv_prefixo' => $dv_prefixo,
                'conta_corrente' => $conta_corrente,
                'dv_conta_corrente' => $dv_conta_corrente,
                'data_geracao' => $emissao,
                'hora_geracao' => $hora,
            ],
            'header_lote' => [
                'inscricao' => $inscricao,
                'numero_inscricao' => $numero_inscricao,
                'nome_empresa' => $nome_empresa,
                'agencia_cooperativa' => $agencia_cooperativa,
                'dv_prefixo' => $dv_prefixo,
                'conta_corrente' => $conta_corrente,
                'dv_conta_corrente' => $dv_conta_corrente,
                'data_gravacao' => $emissao,
            ]
        ]);

        $date = date('dmY', strtotime('+1 month'));
        $emissao = date('dmY');
        $valor_boleto = 0.10;
        $nosso_numero = '000000000001011     ';
        $numero_documento = '123456789012346';
        $Boleto = new Boleto();
        $Boleto->fill([
            'valor' => $valor_boleto,
            'lote'  => $lote,
            'count' => 1,
            'segmentP' => [
                'num_cc_agencia_codigo' => $agencia_cooperativa,
                'digito_verificador' => $dv_prefixo,
                'conta_corrente' => $conta_corrente,
                'conta_corrente_dv' => $dv_conta_corrente,
                'nosso_numero' => $nosso_numero,
                'carteira' => '1',
                'numero_documento' => $numero_documento,
                'data_vencimento' => $date,
                'data_emissao' => $emissao,
                'data_juros_mora' => $date,
            ],
            'segmentQ' => [
                'tipo_inscricao_pagador' => '1',
                'numero_inscricao' => '12345678900',
                'nome' => 'FLAVIO HENRIQUE FERREIRA',
                'endereco' => 'RUA SEBASTIAO MARTINS 80',
                'bairro' => 'Jardim Pedreiras',
                'CEP' => '14430',
                'sufixo_CEP' => '000',
                'cidade' => 'Restinga',
                'uf' => 'SP',
            ],
            'segmentR' => [
                'informacao_3' => 'Mensagem 3 pagamento ate a data',
                'informacao_4' => 'Mensagem 4 pagamento ate a data',
            ],
            'segmentS' => [
                'informacao_5' => 'Telefones para Contato: (16) 3403-3000',
                'informacao_6' => 'Quer um cobrador, entre em contato',
                'informacao_7' => 'Pagavel até o dia o ultimo dia do mes',
                'informacao_8' => 'de vencimento',
                'informacao_9' => 'Site: www.novafranca.com.br',
            ]
        ]);

        $this->object->addBoleto($Boleto);

        $Boleto2 = new Boleto();
        $valor_boleto = 0.10;
        $Boleto2->fill([
            'valor' => $valor_boleto,
            'lote'  => $lote,
            'count' => 2,
            'segmentP' => [
                'num_cc_agencia_codigo' => $agencia_cooperativa,
                'digito_verificador' => $dv_prefixo,
                'conta_corrente' => $conta_corrente,
                'conta_corrente_dv' => $dv_conta_corrente,
                'nosso_numero' => $nosso_numero,
                'carteira' => '1',
                'numero_documento' => $numero_documento,
                'data_vencimento' => $date,
                'data_emissao' => $emissao,
                'data_juros_mora' => $date,
            ],
            'segmentQ' => [
                'tipo_inscricao_pagador' => '1',
                'numero_inscricao' => '12345678900',
                'nome' => 'FLAVIO HENRIQUE FERREIRA',
                'endereco' => 'RUA SEBASTIAO MARTINS 80',
                'bairro' => 'Jardim Pedreiras',
                'CEP' => '14430',
                'sufixo_CEP' => '000',
                'cidade' => 'Restinga',
                'uf' => 'SP',
            ],
            'segmentR' => [
                'informacao_3' => 'Mensagem 3 pagamento ate a data',
                'informacao_4' => 'Mensagem 4 pagamento ate a data',
            ],
            'segmentS' => [
                'informacao_5' => 'Telefones para Contato: (16) 3403-3000',
                'informacao_6' => 'Quer um cobrador, entre em contato',
                'informacao_7' => 'Pagavel até o dia o ultimo dia do mes',
                'informacao_8' => ' de vencimento',
                'informacao_9' => 'Site: www.novafranca.com.br',
            ]
        ]);

        $this->object->addBoleto($Boleto2);

        $lines = $this->object->render(false);

        $size = 240;
        foreach($lines as $line) {
            $this->assertEquals($size, strlen($line));
        }

        $path = __DIR__ . '/../../remessa.' . $date . '.REM';
        $this->object->saveFile($path);

        $this->assertFileExists($path);
        @unlink($path);
    }

}