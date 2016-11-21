<?php
namespace Sicoob\Remessa\CNAB240;

/**
 * Class TrailerLote
 * @package Sicoob\Remessa\CNAB240
 */
class TrailerArquivo extends LineAbstract
{
    /**
     * @var array
     */
    public $configs = [
        'banco' => [
            'seq' => '01.9',
            'start' => 1,
            'end' => 3,
            'size' => 3,
            'default' => 756,
            'type' => 'numeric',
            'description' => 'Código do Sicoob na Compensação: 756'
        ],
        'lote' => [
            'seq' => '02.9',
            'start' => 4,
            'end' => 7,
            'size' => 4,
            'default' => '9999',
            'type' => 'numeric',
            'description' => 'Preencher com 9999'
        ],
        'registro' => [
            'seq' => '03.9',
            'start' => 8,
            'end' => 8,
            'size' => 1,
            'default' => '9',
            'type' => 'numeric',
            'description' => 'Tipo de Registro: "9"'
        ],
        'cnab_1' => [
            'seq' => '04.9',
            'start' => 9,
            'end' => 17,
            'size' => 9,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: Preencher com espaços em branco'
        ],
        'quantidade_lotes' => [
            'seq' => '05.9',
            'start' => 18,
            'end' => 23,
            'size' => 6,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Quantidade de Lotes do Arquivo'
        ],
        'quantidade_registros' => [
            'seq' => '06.9',
            'start' => 24,
            'end' => 29,
            'size' => 6,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Quantidade de Registros do Arquivo'
        ],
        'quantidade_contas' => [
            'seq' => '07.9',
            'start' => 30,
            'end' => 35,
            'size' => 6,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Qtde de Contas p/ Conc. (Lotes): "000000"'
        ],
        'cnab_2' => [
            'seq' => '04.9',
            'start' => 36,
            'end' => 240,
            'size' => 205,
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

