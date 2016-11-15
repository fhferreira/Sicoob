<?php
namespace Sicoob\Remessa\CNAB240;

class SegmentR extends LineAbstract
{
    public $configs = [
        'banco' => [
            'seq' => '01.3R',
            'start' => 1,
            'end' => 3,
            'size' => 3,
            'default' => 756,
            'type' => 'numeric',
            'description' => 'Código do Sicoob na Compensação: 756'
        ],
        'lote' => [
            'seq' => '02.3R',
            'start' => 4,
            'end' => 7,
            'size' => 4,
            'default' => '0001',
            'type' => 'numeric',
            'description' => '"Lote de Serviço: Número seqüencial para identificar univocamente um lote de serviço. 
                               Criado e controlado pelo responsável pela geração magnética dos dados contidos no arquivo.
                               Preencher com \'0001\' para o primeiro lote do arquivo. 
                               Para os demais: número do lote anterior acrescido de 1. 
                               O número não poderá ser repetido dentro do arquivo."'
        ],
        'registro' => [
            'seq' => '03.3R',
            'start' => 8,
            'end' => 8,
            'size' => 1,
            'default' => '3',
            'type' => 'numeric',
            'description' => 'Tipo de Registro "3"'
        ],
        'registro_item' => [
            'seq' => '04.3R',
            'start' => 9,
            'end' => 13,
            'size' => 5,
            'default' => '00001',
            'type' => 'numeric',
            'description' => 'Nº Sequencial do Registro no Lote:
                              Número adotado para identificar a sequência de registros encaminhados no lote.
                              Preencher com \'00001\' para o primeiro segmento P do lote do arquivo.
                              Para os demais: número do segmento anterior acrescido de 1.
                              Ex: Se segmentos anteriores P = ""00001"" e Q = ""00002"".
                              Então segmento R = ""00003"" e assim consecutivamente.'
        ],
        'segmento' => [
            'seq' => '05.3R',
            'start' => 14,
            'end' => 14,
            'size' => 1,
            'default' => 'R',
            'type' => 'string',
            'description' => 'Cód. Segmento do Registro Detalhe: "R"'
        ],
        'cnab_1' => [
            'seq' => '06.3R',
            'start' => 15,
            'end' => 15,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: Preencher com espaços em branco'
        ],
        'codigo_movimento' => [
            'seq' => '07.3R',
            'start' => 16,
            'end' => 17,
            'size' => 2,
            'default' => '01',
            'type' => 'numeric',
            'description' => 'Código de Movimento Remessa: \'01\'  =  Entrada de Títulos"'
        ],
        'codigo_desconto_2' => [
            'seq' => '08.3R',
            'start' => 18,
            'end' => 18,
            'size' => 1,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Código do Desconto 2
                                \'0\'  =  Não Conceder desconto
                                \'1\'  =  Valor Fixo Até a Data Informada
                                \'2\'  =  Percentual Até a Data Informada'
        ],
        'data_desconto_2' => [
            'seq' => '09.3R',
            'start' => 19,
            'end' => 26,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Data do Desconto 2'
        ],
        'valor_desconto_2' => [
            'seq' => '10.3R',
            'start' => 27,
            'end' => 41,
            'size' => 15,
            'default' => 0,
            'type' => 'money',
            'description' => 'Valor/Percentual a ser Concedido'
        ],
        'codigo_desconto_3' => [
            'seq' => '11.3R',
            'start' => 42,
            'end' => 42,
            'size' => 1,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Código do Desconto 3
                                \'0\'  =  Não Conceder desconto
                                \'1\'  =  Valor Fixo Até a Data Informada
                                \'2\'  =  Percentual Até a Data Informada'
        ],
        'data_desconto_3' => [
            'seq' => '12.3R',
            'start' => 43,
            'end' => 50,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Data do Desconto 3'
        ],
        'valor_desconto_3' => [
            'seq' => '13.3R',
            'start' => 51,
            'end' => 65,
            'size' => 15,
            'default' => 0,
            'type' => 'money',
            'description' => 'Valor/Percentual a ser Concedido 3'
        ],
        'codigo_multa' => [
            'seq' => '14.3R',
            'start' => 66,
            'end' => 66,
            'size' => 1,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Código da Multa:
                                \'0\'  =  Isento
                                \'1\'  =  Valor Fixo
                                \'2\'  =  Percentual'
        ],
        'data_multa' => [
            'seq' => '15.3R',
            'start' => 67,
            'end' => 74,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Data da Multa: preencher com a Data de Vencimento do Título formato DDMMAAAA'
        ],
        'valor_multa' => [
            'seq' => '16.3R',
            'start' => 75,
            'end' => 89,
            'size' => 15,
            'default' => 0,
            'type' => 'money',
            'description' => 'Valor/Percentual a Ser Aplicado
                              Ex: 0000000000220 = 2,20%; 
                              Ex: 0000000001040 = 10,40%'
        ],
        'informacao_pagador' => [
            'seq' => '17.3R',
            'start' => 90,
            'end' => 99,
            'size' => 10,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Informação ao Pagador: Preencher com espaços em branco'
        ],
        'informacao_3' => [
            'seq' => '18.3R',
            'start' => 100,
            'end' => 139,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Mensagem 3: Texto de observações destinado ao envio de mensagens livres, 
                              a serem impressas no campo de instruções da ficha de compensação do bloqueto.
                              As Mensagens 3 e 4 prevalecem sobre as mensagens 1 e 2.'
        ],
        'informacao_4' => [
            'seq' => '19.3R',
            'start' => 140,
            'end' => 179,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Mensagem 4: Texto de observações destinado ao envio de mensagens livres, 
                              a serem impressas no campo de instruções da ficha de compensação do bloqueto.
                              as Mensagens 3 e 4 prevalecem sobre as mensagens 1 e 2.'
        ],
        'cnab_2' => [
            'seq' => '20.3R',
            'start' => 180,
            'end' => 199,
            'size' => 20,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: Preencher com espaços em branco'
        ],
        'cod_ocorrencia_pagador' => [
            'seq' => '21.3R',
            'start' => 200,
            'end' => 207,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Cód. Ocor. do Pagador: "00000000"'
        ],
        'debito_banco' => [
            'seq' => '22.3R',
            'start' => 208,
            'end' => 210,
            'size' => 3,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Cód. do Banco na Conta do Débito: "000"'
        ],
        'debito_agencia' => [
            'seq' => '23.3R',
            'start' => 211,
            'end' => 215,
            'size' => 5,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Código da Agência do Débito: "00000"'
        ],
        'debito_agencia_dv' => [
            'seq' => '24.3R',
            'start' => 216,
            'end' => 216,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Dígito Verificador da Agência: Preencher com espaços em branco'
        ],

        'debito_conta_corrente' => [
            'seq' => '25.3R',
            'start' => 217,
            'end' => 228,
            'size' => 12,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Conta Corrente para Débito: "000000000000"'
        ],

        'debito_conta_corrente_dv' => [
            'seq' => '26.3R',
            'start' => 229,
            'end' => 229,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Dígito Verificador da Conta: Preencher com espaços em branco'
        ],

        'debito_agencia_conta_dv' => [
            'seq' => '27.3R',
            'start' => 230,
            'end' => 230,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Dígito Verificador Ag/Conta: Preencher com espaços em branco'
        ],

        'emissao_aviso_debito' => [
            'seq' => '28.3R',
            'start' => 231,
            'end' => 231,
            'size' => 1,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Aviso para Débito Automático: "0"'
        ],

        'cnab_3' => [
            'seq' => '29.3R',
            'start' => 232,
            'end' => 240,
            'size' => 9,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: Preencher com espaços em branco'
        ],
    ];

    public function __construct($attributes = [])
    {
        parent::construct($attributes);
    }

}