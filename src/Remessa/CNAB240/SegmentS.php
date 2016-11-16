<?php
namespace Sicoob\Remessa\CNAB240;

/**
 * Class SegmentS
 * @package Sicoob\Remessa\CNAB240
 */
class SegmentS extends LineAbstract
{

    /**
     * @var array
     */
    public $configs = [
        'banco' => [
            'seq' => '01.3S',
            'start' => 1,
            'end' => 3,
            'size' => 3,
            'default' => 756,
            'type' => 'numeric',
            'description' => 'Código do Sicoob na Compensação: 756'
        ],
        'lote' => [
            'seq' => '02.3S',
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
            'seq' => '03.3S',
            'start' => 8,
            'end' => 8,
            'size' => 1,
            'default' => '3',
            'type' => 'numeric',
            'description' => 'Tipo de Registro "3"'
        ],
        'registro_item' => [
            'seq' => '04.3S',
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
            'seq' => '05.3S',
            'start' => 14,
            'end' => 14,
            'size' => 1,
            'default' => 'S',
            'type' => 'string',
            'description' => 'Cód. Segmento do Registro Detalhe: "R"'
        ],
        'cnab_1' => [
            'seq' => '06.3S',
            'start' => 15,
            'end' => 15,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: Preencher com espaços em branco'
        ],
        'codigo_movimento' => [
            'seq' => '07.3S',
            'start' => 16,
            'end' => 17,
            'size' => 2,
            'default' => '01',
            'type' => 'numeric',
            'description' => 'Código de Movimento Remessa: \'01\'  =  Entrada de Títulos"'
        ],
        'tipo_impressao' => [
            'seq' => '08.3S',
            'start' => 18,
            'end' => 18,
            'size' => 1,
            'default' => '3',
            'type' => 'numeric',
            'description' => 'Identificação da Impressão: \'3\'  =  Corpo de Instruções da Ficha de Compensação do Boleto'
        ],

        'informacao_5' => [
            'seq' => '09.3S',
            'start' => 19,
            'end' => 58,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Mensagem 5: Texto de observações destinado ao envio de mensagens livres, 
                              a serem impressas no campo de instruções da ficha de compensação do bloqueto.
                              As mensagens 5 à 9 prevalecem sobre as anteriores.'
        ],
        'informacao_6' => [
            'seq' => '10.3S',
            'start' => 59,
            'end' => 98,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Mensagem 6: Texto de observações destinado ao envio de mensagens livres, 
                              a serem impressas no campo de instruções da ficha de compensação do bloqueto.
                              As mensagens 5 à 9 prevalecem sobre as anteriores.'
        ],
        'informacao_7' => [
            'seq' => '11.3S',
            'start' => 99,
            'end' => 138,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Mensagem 7: Texto de observações destinado ao envio de mensagens livres, 
                              a serem impressas no campo de instruções da ficha de compensação do bloqueto.
                              As mensagens 5 à 9 prevalecem sobre as anteriores.'
        ],
        'informacao_8' => [
            'seq' => '12.3S',
            'start' => 139,
            'end' => 178,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Mensagem 5: Texto de observações destinado ao envio de mensagens livres, 
                              a serem impressas no campo de instruções da ficha de compensação do bloqueto.
                              As mensagens 5 à 9 prevalecem sobre as anteriores.'
        ],
        'informacao_9' => [
            'seq' => '13.3S',
            'start' => 179,
            'end' => 218,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Mensagem 9: Texto de observações destinado ao envio de mensagens livres, 
                              a serem impressas no campo de instruções da ficha de compensação do bloqueto.
                              As mensagens 5 à 9 prevalecem sobre as anteriores.'
        ],
        'cnab_2' => [
            'seq' => '14.3S',
            'start' => 219,
            'end' => 240,
            'size' => 22,
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