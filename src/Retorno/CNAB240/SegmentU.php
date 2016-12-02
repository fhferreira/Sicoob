<?php

namespace Sicoob\Retorno\CNAB240;

class SegmentU extends LineAbstract
{
    public $configs = [
        'banco' => [
            'seq' => '01.3U',
            'start' => 1,
            'end' => 3,
            'length' => 3,
            'required' => '756',
            'type' => 'numeric',
            'description' => 'Código do Banco na Compensação: "756"'
        ],
        'lote' => [
            'seq' => '02.3U',
            'start' => 4,
            'end' => 7,
            'length' => 4,
            'required' => '',
            'type' => 'numeric',
            'description' => 'Código do Lote 0001'
        ],
        'tipo_registro' => [
            'seq' => '03.3U',
            'start' => 8,
            'end' => 8,
            'length' => 1,
            'required' => '3',
            'type' => 'numeric',
            'description' => 'Tipo de Registro: "3"'
        ],
        'sequencial' => [
            'seq' => '04.3U',
            'start' => 9,
            'end' => 13,
            'length' => 5,
            'required' => '',
            'type' => 'numeric',
            'description' => 'Nº Sequencial do Registro no Lote: Número adotado e controlado pelo responsável pela geração magnética dos dados contidos no arquivo, para identificar a seqüência de registros encaminhados no lote. Deve ser inicializado sempre em \'1\', em cada novo lote.'
        ],
        'segmento' => [
            'seq' => '05.3U',
            'start' => 14,
            'end' => 14,
            'length' => 1,
            'required' => 'U',
            'type' => 'string',
            'description' => 'Cód. Segmento do Registro Detalhe: "U"'
        ],
        'cnab_1' => [
            'seq' => '06.3U',
            'start' => 15,
            'end' => 15,
            'length' => 1,
            'required' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco'
        ],
        'codigo_movimento_retorno' => [
            'seq' => '07.3U',
            'start' => 16,
            'end' => 17,
            'length' => 2,
            'required' => 'U',
            'type' => 'string',
            'description' => 'Código de Movimento de Retorno',
            'values' => [
                '02' => 'Entrada Confirmada',
                '03' => 'Entrada Rejeitada',
                '04' => 'Transferência de Carteira/Entrada',
                '05' => 'Transferência de Carteira/Baixa',
                '06' => 'Liquidação',
                '07' => 'Confirmação do Recebimento da Instrução de Desconto',
                '08' => 'Confirmação do Recebimento do Cancelamento do Desconto',
                '09' => 'Baixa',
                '11' => 'Títulos em Carteira (Em Ser)',
                '12' => 'Confirmação Recebimento Instrução de Abatimento',
                '13' => 'Confirmação Recebimento Instrução de Cancelamento Abatimento',
                '14' => 'Confirmação Recebimento Instrução Alteração de Vencimento',
                '15' => 'Franco de Pagamento',
                '17' => 'Liquidação Após Baixa ou Liquidação Título Não Registrado',
                '19' => 'Confirmação Recebimento Instrução de Protesto',
                '20' => 'Confirmação Recebimento Instrução de Sustação/Cancelamento de Protesto',
                '23' => 'Remessa a Cartório (Aponte em Cartório)',
                '24' => 'Retirada de Cartório e Manutenção em Carteira',
                '25' => 'Protestado e Baixado (Baixa por Ter Sido Protestado)',
                '26' => 'Instrução Rejeitada',
                '27' => 'Confirmação do Pedido de Alteração de Outros Dados',
                '28' => 'Débito de Tarifas/Custas',
                '29' => 'Ocorrências do Pagador',
                '30' => 'Alteração de Dados Rejeitada',
                '33' => 'Confirmação da Alteração dos Dados do Rateio de Crédito',
                '34' => 'Confirmação do Cancelamento dos Dados do Rateio de Crédito',
                '35' => 'Confirmação do Desagendamento do Débito Automático',
                '36' => 'Confirmação de envio de e-mail/SMS',
                '37' => 'Envio de e-mail/SMS rejeitado',
                '38' => 'Confirmação de alteração do Prazo Limite de Recebimento (a data deve ser',
                '39' => 'Confirmação de Dispensa de Prazo Limite de Recebimento',
                '40' => 'Confirmação da alteração do número do título dado pelo Beneficiário',
                '41' => 'Confirmação da alteração do número controle do Participante',
                '42' => 'Confirmação da alteração dos dados do Pagador',
                '43' => 'Confirmação da alteração dos dados do Pagadorr/Avalista',
                '44' => 'Título pago com cheque devolvido',
                '45' => 'Título pago com cheque compensado',
                '46' => 'Instrução para cancelar protesto confirmada',
                '47' => 'Instrução para protesto para fins falimentares confirmada',
                '48' => 'Confirmação de instrução de transferência de carteira/modalidade de cobrança',
                '49' => 'Alteração de contrato de cobrança',
                '50' => 'Título pago com cheque pendente de liquidação',
                '51' => 'Título DDA reconhecido pelo Pagador',
                '52' => 'Título DDA não reconhecido pelo Pagador',
                '53' => 'Título DDA recusado pela CIP',
                '54' => 'Confirmação da Instrução de Baixa de Título Negativado sem Protesto',
                '55' => 'Confirmação de Pedido de Dispensa de Multa',
                '56' => 'Confirmação do Pedido de Cobrança de Multa',
                '57' => 'Confirmação do Pedido de Alteração de Cobrança de Juros',
                '58' => 'Confirmação do Pedido de Alteração do Valor/Data de Desconto',
                '59' => 'Confirmação do Pedido de Alteração do Beneficiário do Título',
                '60' => 'Confirmação do Pedido de Dispensa de Juros de Mora',
            ]
        ],
        'valor_juros' => [
            'seq' => '08.3U',
            'start' => 18,
            'end' => 32,
            'length' => 15,
            'required' => '',
            'type' => 'money',
            'description' => 'Valor dos Juros / Multa / Encargos: Valor dos acréscimos efetuados no título de cobrança, expresso em moeda corrente.'
        ],
        'valor_descontos' => [
            'seq' => '09.3U',
            'start' => 33,
            'end' => 47,
            'length' => 15,
            'required' => '',
            'type' => 'money',
            'description' => 'Valor dos descontos efetuados no título de cobrança, expresso em moeda corrente.'
        ],
        'valor_abatimento_ou_cancelados' => [
            'seq' => '10.3U',
            'start' => 48,
            'end' => 62,
            'length' => 15,
            'required' => '',
            'type' => 'money',
            'description' => 'Valor dos abatimentos efetuados ou cancelados no título de cobrança, expresso em moeda corrente.'
        ],
        'valor_iof' => [
            'seq' => '11.3U',
            'start' => 48,
            'end' => 62,
            'length' => 15,
            'required' => '',
            'type' => 'money',
            'description' => 'Valor do IOF - Imposto sobre Operações Financeiras - recolhido sobre o Título, expresso em moeda corrente.'
        ],
        'valor_pago' => [
            'seq' => '12.3U',
            'start' => 63,
            'end' => 77,
            'length' => 15,
            'required' => '',
            'type' => 'money',
            'description' => 'Valor do pagamento efetuado pelo Pagador referente ao título de cobrança, expresso em moeda corrente.'
        ],
        'valor_liquido' => [
            'seq' => '13.3U',
            'start' => 93,
            'end' => 107,
            'length' => 15,
            'required' => '',
            'type' => 'money',
            'description' => 'Valor efetivo a ser creditado referente ao Título, expresso em moeda corrente.'
        ],
        'valor_efetivo_despesas' => [
            'seq' => '14.3U',
            'start' => 108,
            'end' => 122,
            'length' => 15,
            'required' => '',
            'type' => 'money',
            'description' => 'Valor efetivo de despesas referente ao título de cobrança, expresso em moeda corrente.'
        ],
        'valor_efetivo_creditos' => [
            'seq' => '15.3U',
            'start' => 123,
            'end' => 137,
            'length' => 15,
            'required' => '',
            'type' => 'money',
            'description' => 'Valor efetivo de créditos referente ao título de cobrança, expresso em moeda corrente.'
        ],
        'data_evento' => [
            'seq' => '17.3U',
            'start' => 138,
            'end' => 145,
            'length' => 8,
            'required' => '',
            'type' => 'date',
            'description' => 'Data do evento que afeta o estado do título de cobrança.
                              Utilizar o formato DDMMAAAA, 
                              onde:
                              DD = dia
                              MM = mês
                              AAAA = ano'
        ],
        'ocorrencia_pagador' => [
            'seq' => '18.3U',
            'start' => 154,
            'end' => 157,
            'length' => 4,
            'required' => '',
            'type' => 'string',
            'description' => 'Ocorr. do Pagador	Código o sistema retorna com as posições em branco'
        ],
        'data_ocorrencia' => [
            'seq' => '19.3U',
            'start' => 158,
            'end' => 165,
            'length' => 8,
            'required' => '',
            'type' => 'date',
            'description' => 'Data Ocorrência:" 00000000"'
        ],
        'valor_ocorrencia' => [
            'seq' => '20.3U',
            'start' => 166,
            'end' => 180,
            'length' => 15,
            'required' => '',
            'type' => 'money',
            'description' => 'Valor da Ocorrência: "000000000000000"'
        ],
        'compl_ocorrencia' => [
            'seq' => '21.3U',
            'start' => 181,
            'end' => 210,
            'length' => 30,
            'required' => '',
            'type' => 'string',
            'description' => 'Compl. da Ocorrência o sistema retorna com as posições em branco'
        ],
        'banco_correspondente' => [
            'seq' => '22.3U',
            'start' => 211,
            'end' => 213,
            'length' => 3,
            'required' => '',
            'type' => 'numeric',
            'description' => 'Cód. Bco. Corresp. na Compensação: Caso o Beneficiário não tenha contratado a opção de Banco Correspondente com o Sicoob, virá preenchido com "756" - Caso o Beneficiário tenha contratado a opção de Banco Correspondente com o Sicoob virá preenchido com "001" (Banco do Brasil)'
        ],
        'numero_banco_correspondente' => [
            'seq' => '23.3U',
            'start' => 214,
            'end' => 233,
            'length' => 20,
            'required' => '',
            'type' => 'numeric',
            'description' => 'Código fornecido pelo Banco Correspondente para identificação do Título de Cobrança.'
        ],
        'cnab_2' => [
            'seq' => '24.3U',
            'start' => 234,
            'end' => 240,
            'length' => 7,
            'required' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco'
        ],
    ];

    public function __construct($line = null)
    {
        parent::__construct($line);
    }

}