<?php

namespace Sicoob\Retorno\CNAB240;

class SegmentT extends LineAbstract
{

    public $configs = [
            'banco' => [
                    'seq' => '01.3T',
                    'start' => 1,
                    'end' => 3,
                    'length' => 3,
                    'required' => '756',
                    'type' => 'numeric',
                    'description' => 'Código do Banco na Compensação: "756"'
                ],
            'lote' => [
                'seq' => '02.3T',
                'start' => 4,
                'end' => 7,
                'length' => 4,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Código do Lote 0001'
            ],
            'tipo_registro' => [
                'seq' => '03.3T',
                'start' => 8,
                'end' => 8,
                'length' => 1,
                'required' => '3',
                'type' => 'numeric',
                'description' => 'Tipo de Registro: "3"'
            ],
            'sequencial' => [
                'seq' => '04.3T',
                'start' => 9,
                'end' => 13,
                'length' => 5,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Nº Sequencial do Registro no Lote: Número adotado e controlado pelo responsável pela geração magnética dos dados contidos no arquivo, para identificar a seqüência de registros encaminhados no lote. Deve ser inicializado sempre em \'1\', em cada novo lote.'
            ],
            'segmento' => [
                'seq' => '05.3T',
                'start' => 14,
                'end' => 14,
                'length' => 1,
                'required' => 'T',
                'type' => 'string',
                'description' => 'Cód. Segmento do Registro Detalhe: " T "'
            ],
            'cnab_1' => [
                'seq' => '06.3T',
                'start' => 15,
                'end' => 15,
                'length' => 1,
                'required' => '',
                'type' => 'string',
                'description' => 'Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco'
            ],
            'codigo_movimento_retorno' => [
                'seq' => '07.3T',
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
            'agencia' => [
                'seq' => '08.3T',
                'start' => 18,
                'end' => 22,
                'length' => 5,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Prefixo da Cooperativa: vide planilha "Contracapa" deste arquivo'
            ],
            'agencia_dv' => [
                'seq' => '09.3T',
                'start' => 23,
                'end' => 23,
                'length' => 1,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Dígito Verificador do Prefixo: vide planilha "Contracapa" deste arquivo'
            ],
            'conta_corrente' => [
                'seq' => '10.3T',
                'start' => 24,
                'end' => 35,
                'length' => 12,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Conta Corrente: vide planilha "Contracapa" deste arquivo'
            ],
            'conta_corrente_dv' => [
                'seq' => '11.3T',
                'start' => 36,
                'end' => 36,
                'length' => 1,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Dígito Verificador da Conta: vide planilha "Contracapa" deste arquivo'
            ],
            'dv_agencia_conta' => [
                'seq' => '12.3T',
                'start' => 37,
                'end' => 37,
                'length' => 1,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Dígito Verificador da Ag/Conta: o sistema retorna com as posições em branco'
            ],
            'nosso_numero' => [
                'seq' => '13.3T',
                'start' => 38,
                'end' => 57,
                'length' => 20,
                'required' => '',
                'type' => 'array',
                'description' => '
                        - Se emissão a cargo do Sicoob (vide planilha ""Contracapa"" deste arquivo): Brancos
                        - Se emissão a cargo do Beneficiário (vide planilha ""Contracapa"" deste arquivo):
                             NumTitulo - 10 posições (1 a 10)
                             Parcela - 02 posições (11 a 12) - ""01"" se parcela única
                             Modalidade - 02 posições (13 a 14) - vide planilha ""Contracapa"" deste arquivo
                             Tipo Formulário - 01 posição  (15 a 15):
                                  ""1"" -auto-copiativo
                                  ""3""-auto-envelopável
                                  ""4""-A4 sem envelopamento
                                  ""6""-A4 sem envelopamento 3 vias
                             Em branco - 05 posições (16 a 20)"',
                'helper' => 'formatNossoNumero'
            ],
            'carteira' => [
                'seq' => '14.3T',
                'start' => 58,
                'end' => 58,
                'length' => 1,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Código da Carteira: vide planilha "Contracapa" deste arquivo'
            ],
            'numero_documento' => [
                'seq' => '15.3T',
                'start' => 59,
                'end' => 73,
                'length' => 15,
                'required' => '',
                'type' => 'string',
                'description' => 'Número do Documento de Cobrança: Número adotado e controlado pelo Cliente, para identificar o título de cobrança. Informação utilizada pelo Sicoob para referenciar a identificação do documento objeto de cobrança. Poderá conter número de duplicata, no caso de cobrança de duplicatas; número da apólice, no caso de cobrança de seguros, etc'
            ],
            'data_vencimento' => [
                'seq' => '16.3T',
                'start' => 74,
                'end' => 81,
                'length' => 8,
                'required' => '',
                'type' => 'date',
                'description' => 'Data de Vencimento do Título'
            ],
            'valor_nominal' => [
                'seq' => '17.3T',
                'start' => 82,
                'end' => 96,
                'length' => 15,
                'required' => '',
                'type' => 'money',
                'description' => 'Valor Nominal do Título'
            ],
            'banco_cobrador' => [
                'seq' => '18.3T',
                'start' => 97,
                'end' => 99,
                'length' => 3,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Número do Banco Cobrador / Recebedor: Só será informado nos casos de cobrança / liquidação em outros bancos.'
            ],
            'agencia_cobradora' => [
                'seq' => '19.3T',
                'start' => 100,
                'end' => 104,
                'length' => 5,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Código adotado pelo Banco responsável pela conta, para identificar a qual unidade está vinculada a conta corrente.'
            ],
            'dv_agencia_cobradora' => [
                'seq' => '20.3T',
                'start' => 105,
                'end' => 105,
                'length' => 1,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Dígito Verificador da Agência Recebedora.'
            ],
            'identificao_titulo' => [
                'seq' => '21.3T',
                'start' => 106,
                'end' => 130,
                'length' => 25,
                'required' => '',
                'type' => 'string',
                'description' => 'Uso Empresa Beneficiário: Identificação do Título na Empresa: Campo destinado para uso do Beneficiário para identificação do Título.'
            ],
            'codigo_moeda' => [
                'seq' => '22.3T',
                'start' => 131,
                'end' => 132,
                'length' => 2,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Código da Moeda',
                'values' => [
                    '02'  => 'Dólar Americano Comercial (Venda)',
                    '09'  => 'Real'
                ]
            ],
            'tipo_inscricao' => [
                'seq' => '23.3T',
                'start' => 133,
                'end' => 133,
                'length' => 1,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Tipo de Inscrição Pagador',
                'values' => [
                    '1'  => 'CPF',
                    '2'  => 'CGC / CNPJ'
                ]
            ],
            'numero_inscricao' => [
                'seq' => '24.3T',
                'start' => 134,
                'end' => 148,
                'length' => 15,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Número Inscrição',
            ],
            'nome_pagador' => [
                'seq' => '25.3T',
                'start' => 149,
                'end' => 188,
                'length' => 40,
                'required' => '',
                'type' => 'string',
                'description' => 'Nome Pagador',
            ],
            'numero_contrato' => [
                'seq' => '26.3T',
                'start' => 189,
                'end' => 198,
                'length' => 10,
                'required' => '',
                'type' => 'numeric',
                'description' => 'Nº do Contr. da Operação de Crédito: Número adotado pela Empresa Beneficiária para identificação do número do contrato.',
            ],
            'valor_tarifa_custas' => [
                'seq' => '27.3T',
                'start' => 199,
                'end' => 213,
                'length' => 15,
                'required' => '',
                'type' => 'money',
                'description' => 'Valor da Tarifa / Custas',
            ],
            'motivo_ocorrencia' => [
                'seq' => '28.3T',
                'start' => 214,
                'end' => 223,
                'length' => 10,
                'required' => '',
                'type' => 'string',
                'description' => 'Código adotado pela FEBRABAN para identificar as ocorrências (rejeições, tarifas, custas, liquidação e baixas) em registros detalhe de títulos de cobrança. Poderão ser informados até cinco ocorrências distintas, incidente sobre o título.',
            ],
            'cnab_2' => [
                'seq' => '29.3T',
                'start' => 224,
                'end' => 240,
                'length' => 17,
                'required' => '',
                'type' => 'string',
                'description' => 'Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco.',
            ],
        ];

    public function __construct($line = null)
    {
        parent::__construct($line);
    }

}