<?php
namespace Sicoob\Remessa\CNAB240;

class SegmentQ extends LineAbstract
{

    public $configs = [
        'banco' => [
            'seq' => '01.3Q',
            'start' => 1,
            'end' => 3,
            'size' => 3,
            'default' => 756,
            'type' => 'numeric',
            'description' => 'Código do Sicoob na Compensação: 756'
        ],
        'lote' => [
            'seq' => '02.3Q',
            'start' => 4,
            'end' => 7,
            'size' => 4,
            'default' => '0001',
            'type' => 'numeric',
            'description' => 'Lote de Serviço: 
                              Número seqüencial para identificar univocamente um lote de serviço. 
                              Criado e controlado pelo responsável pela geração magnética dos dados contidos no arquivo.
                              Preencher com \'0001\' para o primeiro lote do arquivo. Para os demais: número do lote anterior acrescido de 1. 
                              O número não poderá ser repetido dentro do arquivo.'
        ],
        'registro' => [
            'seq' => '03.3Q',
            'start' => 8,
            'end' => 8,
            'size' => 1,
            'default' => '3',
            'type' => 'numeric',
            'description' => 'Tipo de Registro "3"'
        ],
        'registro_item' => [
            'seq' => '04.3Q',
            'start' => 9,
            'end' => 13,
            'size' => 5,
            'default' => '1',
            'type' => 'numeric',
            'description' => 'Nº Sequencial do Registro no Lote: Número adotado para identificar a sequência de registros encaminhados no lote. 
                              Preencher com \'00001\' para o primeiro segmento P do lote do arquivo. 
                              Para os demais: número do segmento anterior acrescido de 1.
                              Ex: Se segmento anterior P = ""00001"". Então, segmento Q = ""00002"" e assim consecutivamente."'
        ],
        'segmento' => [
            'seq' => '05.3Q',
            'start' => 14,
            'end' => 14,
            'size' => 1,
            'default' => 'Q',
            'type' => 'string',
            'description' => 'Cód. Segmento do Registro Detalhe: "Q"'
        ],
        'cnab_1' => [
            'seq' => '06.3Q',
            'start' => 15,
            'end' => 15,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: Preencher com espaços em branco'
        ],
        'codigo_remessa' => [
            'seq' => '07.3Q',
            'start' => 16,
            'end' => 17,
            'size' => 2,
            'default' => '1',
            'type' => 'numeric',
            'description' => 'Código de Movimento Remessa:
                              \'01\' = Entrada de Títulos'
        ],
        'tipo_inscricao_pagador' => [
            'seq' => '08.3Q',
            'start' => 18,
            'end' => 18,
            'size' => 1,
            'default' => '1',
            'type' => 'numeric',
            'description' => 'Tipo de Inscrição Pagador:
                              \'1\' = CPF
                              \'2\' = CGC / CNPJ'
        ],
        'numero_inscricao' => [
            'seq' => '09.3Q',
            'start' => 19,
            'end' => 33,
            'size' => 15,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Número de Inscrição'
        ],
        'nome' => [
            'seq' => '10.3Q',
            'start' => 34,
            'end' => 73,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Nome'
        ],
        'endereco' => [
            'seq' => '11.3Q',
            'start' => 74,
            'end' => 113,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Endereço'
        ],
        'bairro' => [
            'seq' => '12.3Q',
            'start' => 114,
            'end' => 128,
            'size' => 15,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Bairro'
        ],
        'CEP' => [
            'seq' => '13.3Q',
            'start' => 129,
            'end' => 133,
            'size' => 5,
            'default' => '',
            'type' => 'numeric',
            'description' => 'CEP'
        ],
        'sufixo_CEP' => [
            'seq' => '14.3Q',
            'start' => 134,
            'end' => 136,
            'size' => 3,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Sufixo do CEP'
        ],
        'cidade' => [
            'seq' => '15.3Q',
            'start' => 137,
            'end' => 151,
            'size' => 15,
            'default' => '',
            'type' => 'string',
            'description' => 'Cidade'
        ],
        'uf' => [
            'seq' => '16.3Q',
            'start' => 152,
            'end' => 153,
            'size' => 2,
            'default' => '',
            'type' => 'string',
            'description' => 'UF - Unidade da Federação'
        ],
        'tipo_inscricao_sacador' => [
            'seq' => '17.3Q',
            'start' => 154,
            'end' => 154,
            'size' => 1,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Tipo de Inscrição Sacador Avalista:
                              \'1\' = CPF
                              \'2\' = CGC / CNPJ'
        ],
        'numero_inscricao_sacador' => [
            'seq' => '09.3Q',
            'start' => 155,
            'end' => 169,
            'size' => 15,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Número de Inscrição Sacador Avalista'
        ],
        'nome_sacador' => [
            'seq' => '19.3Q',
            'start' => 170,
            'end' => 209,
            'size' => 40,
            'default' => '',
            'type' => 'string',
            'description' => 'Nome do Sacador/Avalista'
        ],
        'codigo_banco_compensacao' => [
            'seq' => '20.3Q',
            'start' => 210,
            'end' => 212,
            'size' => 3,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Cód. Bco. Corresp. na Compensação:
             Caso o Beneficiário não tenha contratado a opção de Banco Correspondente com o Sicoob, preencher com "000"
             Caso o Beneficiário tenha contratado a opção de Banco Correspondente com o 
             Sicoob e a emissão seja a cargo do Sicoob (SEQ 17.3.P do Segmento P do Detalhe), 
             preencher com "001" (Banco do Brasil) ou "237" (Banco Bradesco)."'
        ],

        'nosso_numero_banco_compensacao' => [
            'seq' => '21.3Q',
            'start' => 213,
            'end' => 232,
            'size' => 20,
            'default' => '',
            'type' => 'string',
            'description' => 'Nosso Nº no Banco Correspondente: ""1323739"" (Banco do Brasil) ou ""4498893"" (Banco Bradesco).
            O campo NN deve ser preenchido, somente nos casos em que o campo anterior tenha indicado o uso do Banco Correspondente.
            Obs.: O preenchimento deste campo será alinha à esquerda a partir da posição 213 indo até 219.'
        ],
        'cnab_2' => [
            'seq' => '22.3Q',
            'start' => 233,
            'end' => 240,
            'size' => 8,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB'
        ],
    ];

    public function __construct($attributes = [])
    {
        parent::construct($attributes);
    }

}