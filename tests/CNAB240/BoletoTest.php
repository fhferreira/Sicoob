<?php

namespace Sicoob\Tests\CNAB240;

use Sicoob\Remessa\CNAB240\Boleto;
use Sicoob\Remessa\CNAB240\SegmentP;
use Sicoob\Remessa\CNAB240\SegmentQ;
use Sicoob\Remessa\CNAB240\SegmentR;
use Sicoob\Remessa\CNAB240\SegmentS;
use PHPUnit_Framework_TestCase;

class BoletoTest extends PHPUnit_Framework_TestCase
{
    public $object;

    public function setUp()
    {
        $this->object = new Boleto();
    }

    public function testEntity()
    {
        $this->assertInstanceOf(Boleto::class, $this->object);
    }

    public function testRender()
    {
        $date = date('dmY', strtotime('+1 month'));
        $emissao = date('dmY');
        $this->object->fill([
            'valor' => 3110.12,
            'lote'  => 2,
            'count' => 3,
            'segmentP' => [
                'num_cc_agencia_codigo' => '4321',
                'digito_verificador' => '4',
                'conta_corrente' => '162',
                'conta_corrente_dv' => '7',
                'nosso_numero' => '000000000001011',
                'carteira' => '1',
                'numero_documento' => '000000000000000',
                'data_vencimento' => $date,
                'data_emissao' => $emissao,
                'data_juros_mora' => $date,
            ],
            'segmentQ' => [
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

        $rendered = $this->object->render();

        $this->assertCount(4, $rendered);
        $this->assertContains("7560002300009P 010432140000000001627 000000000001011     10 11000000000000000{$date}00000000031101200000 02A{$emissao}0{$date}000000000000000000000000000000000000000000000000000000000000000000000                         1000   090000000000 ", $rendered[0]);

        $this->assertContains("7560002300010Q 011000000000000000FLAVIO HENRIQUE FERREIRA                RUA SEBASTIAO MARTINS 80                JARDIM PEDREIRA14430000       RESTINGASP0000000000000000                                        000                            ", $rendered[1]);
        $this->assertContains("7560002300011R 01000000000000000000000000000000000000000000000000000000000000000000000000          MENSAGEM 3 PAGAMENTO ATE A DATA         MENSAGEM 4 PAGAMENTO ATE A DATA                             0000000000000000 000000000000  0         ", $rendered[2]);
        $this->assertContains("7560002300012S 013TELEFONES PARA CONTATO: (16) 3403-3000  QUER UM COBRADOR, ENTRE EM CONTATO      PAGAVEL ATE O DIA O ULTIMO DIA DO MES   DE VENCIMENTO                           SITE: WWW.NOVAFRANCA.COM.BR                                   ", $rendered[3]);
    }

}