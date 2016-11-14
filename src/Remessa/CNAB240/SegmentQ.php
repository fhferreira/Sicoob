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

    ];

    public function __construct($attributes = [])
    {
        parent::construct($attributes);
    }

}