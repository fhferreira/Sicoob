<?php
namespace Sicoob\Remessa\CNAB240;

/**
 * Class TrailerLote
 * @package Sicoob\Remessa\CNAB240
 */
class TrailerLote extends LineAbstract
{
    /**
     * @var array
     */
    public $configs = [
        'banco' => [
            'seq' => '01.5',
            'start' => 1,
            'end' => 3,
            'size' => 3,
            'default' => 756,
            'type' => 'numeric',
            'description' => 'Código do Sicoob na Compensação: 756'
        ],
        'lote' => [
            'seq' => '02.5',
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
            'seq' => '03.5',
            'start' => 8,
            'end' => 8,
            'size' => 1,
            'default' => '5',
            'type' => 'numeric',
            'description' => 'Tipo de Registro "5"'
        ],
        'cnab_1' => [
            'seq' => '04.5',
            'start' => 9,
            'end' => 17,
            'size' => 9,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: Preencher com espaços em branco'
        ],
        'quantidade_registros' => [
            'seq' => '05.5',
            'start' => 18,
            'end' => 23,
            'size' => 6,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Quantidade de Registros no Lote'
        ],
        'quantidade_titulos_simples' => [
            'seq' => '06.5',
            'start' => 24,
            'end' => 29,
            'size' => 6,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Quantidade de Títulos em Cobrança Simples'
        ],
        'valor_titulos_simples' => [
            'seq' => '07.5',
            'start' => 30,
            'end' => 46,
            'size' => 17,
            'default' => '',
            'type' => 'money',
            'description' => 'Valor Total dos Títulos em Carteiras Simples'
        ],
        'quantidade_titulos_vinculada' => [
            'seq' => '08.5',
            'start' => 47,
            'end' => 52,
            'size' => 6,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Quantidade de Títulos em Cobrança Vinculada'
        ],
        'valor_titulos_vinculada' => [
            'seq' => '09.5',
            'start' => 53,
            'end' => 69,
            'size' => 17,
            'default' => '',
            'type' => 'money',
            'description' => 'Valor Total dos Títulos em Carteiras Vinculada'
        ],
        'quantidade_titulos_caucionada' => [
            'seq' => '10.5',
            'start' => 70,
            'end' => 75,
            'size' => 6,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Quantidade de Títulos em Cobrança Caucionada'
        ],
        'valor_titulos_caucionada' => [
            'seq' => '11.5',
            'start' => 76,
            'end' => 92,
            'size' => 17,
            'default' => '',
            'type' => 'money',
            'description' => 'Valor Total dos Títulos em Carteiras Caucionada'
        ],
        'quantidade_titulos_descontada' => [
            'seq' => '12.5',
            'start' => 93,
            'end' => 98,
            'size' => 6,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Quantidade de Títulos em Cobrança Descontada'
        ],
        'valor_titulos_descontada' => [
            'seq' => '13.5',
            'start' => 99,
            'end' => 115,
            'size' => 17,
            'default' => '',
            'type' => 'money',
            'description' => 'Valor Total dos Títulos em Carteiras Descontada'
        ],
        'numero_aviso' => [
            'seq' => '14.5',
            'start' => 116,
            'end' => 123,
            'size' => 8,
            'default' => '',
            'type' => 'string',
            'description' => 'Número do Aviso de Lançamento: Preencher com espaços em branco'
        ],
        'cnab_2' => [
            'seq' => '15.5',
            'start' => 124,
            'end' => 240,
            'size' => 117,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: Preencher com espaços em branco'
        ],
    ];

    /**
     * SegmentS constructor.
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::construct($attributes);
    }

}

