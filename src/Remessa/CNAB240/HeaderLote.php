<?php
namespace Sicoob\Remessa\CNAB240;

/**
 * Class HeaderLote
 * @package Sicoob\Remessa\CNAB240
 */
class HeaderLote extends LineAbstract
{
    /**
     * @var array
     */
    public $configs = [
        'banco' => [
            'seq' => '01.1',
            'start' => 1,
            'end' => 3,
            'size' => 3,
            'default' => 756,
            'type' => 'numeric',
            'description' => 'Código do Sicoob na Compensação: 756'
        ],
        'lote' => [
            'seq' => '02.1',
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
            'seq' => '03.1',
            'start' => 8,
            'end' => 8,
            'size' => 1,
            'default' => '1',
            'type' => 'numeric',
            'description' => 'Tipo de Registro "1"'
        ],
        'tipo_operacao' => [
            'seq' => '04.1',
            'start' => 9,
            'end' => 9,
            'size' => 1,
            'default' => 'R',
            'type' => 'string',
            'description' => 'Tipo de Operação: "R"'
        ],
        'tipo_servico' => [
            'seq' => '05.1',
            'start' => 10,
            'end' => 11,
            'size' => 2,
            'default' => '01',
            'type' => 'numeric',
            'description' => 'Tipo de Serviço: "01"'
        ],
        'cnab_1' => [
            'seq' => '06.1',
            'start' => 12,
            'end' => 13,
            'size' => 2,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN / CNAB: Preencher com espaços em branco'
        ],
        'layout_lote' => [
            'seq' => '07.1',
            'start' => 14,
            'end' => 16,
            'size' => 3,
            'default' => '040',
            'type' => 'numeric',
            'description' => 'Nº da Versão do Layout do Lote: "040"'
        ],
        'cnab_2' => [
            'seq' => '08.1',
            'start' => 17,
            'end' => 17,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN / CNAB: Preencher com espaços em branco'
        ],
        'inscricao' => [
            'seq' => '09.1',
            'start' => 18,
            'end' => 18,
            'size' => 1,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Tipo de Inscrição da Empresa:
                             \'1\'  =  CPF
                             \'2\'  =  CGC / CNPJ'
        ],
        'numero_inscricao' => [
            'seq' => '10.1',
            'start' => 19,
            'end' => 33,
            'size' => 15,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Nº de Inscrição da Empresa'
        ],
        'convenio' => [
            'seq' => '11.1',
            'start' => 34,
            'end' => 53,
            'size' => 20,
            'default' => '',
            'type' => 'string',
            'description' => 'Código do Convênio no Banco: Preencher com espaços em branco'
        ],
        'agencia_cooperativa' => [
            'seq' => '12.1',
            'start' => 54,
            'end' => 58,
            'size' => 5,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Código Prefixo da Cooperativa: vide planilha "Contracapa" deste arquivo'
        ],
        'dv_prefixo' => [
            'seq' => '13.1',
            'start' => 59,
            'end' => 59,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Dígito Verificador do Prefixo: vide planilha "Contracapa" deste arquivo'
        ],
        'conta_corrente' => [
            'seq' => '14.1',
            'start' => 60,
            'end' => 71,
            'size' => 12,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Conta Corrente: vide planilha "Contracapa" deste arquivo'
        ],
        'dv_conta_corrente' => [
            'seq' => '15.1',
            'start' => 72,
            'end' => 72,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Dígito Verificador da Conta: vide planilha "Contracapa" deste arquivo'
        ],
        'dv_agencia_conta' => [
            'seq' => '16.1',
            'start' => 73,
            'end' => 73,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Dígito Verificador da Ag/Conta: Preencher com espaços em branco'
        ],
        'nome_empresa' => [
            'seq' => '17.1',
            'start' => 74,
            'end' => 103,
            'size' => 30,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Nome da Empresa'
        ],
        'informacao_1' => [
            'seq' => '18.1',
            'start' => 104,
            'end' => 143,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Mensagem 1: Texto referente a mensagens que serão impressas em todos os boletos referentes ao mesmo lote. 
                              Estes campos não serão utilizados no arquivo retorno.'
        ],
        'informacao_2' => [
            'seq' => '19.1',
            'start' => 144,
            'end' => 183,
            'size' => 40,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Mensagem 2: Texto referente a mensagens que serão impressas em todos os boletos referentes ao mesmo lote. 
                              Estes campos não serão utilizados no arquivo retorno.'
        ],
        'num_controle_cobranca' => [
            'seq' => '20.1',
            'start' => 184,
            'end' => 191,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Número Remessa/Retorno: Número adotado e controlado pelo responsável 
                              pela geração magnética dos dados contidos no arquivo para identificar a 
                              seqüência de envio ou devolução do arquivo entre o Beneficiário e o Sicoob.'
        ],
        'data_gravacao' => [
            'seq' => '21.1',
            'start' => 192,
            'end' => 199,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Data de Gravação Remessa/Retorno'
        ],
        'data_credito' => [
            'seq' => '22.1',
            'start' => 200,
            'end' => 207,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Data do Crédito: "00000000"'
        ],
        'cnab_3' => [
            'seq' => '23.1',
            'start' => 208,
            'end' => 240,
            'size' => 33,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN / CNAB: Preencher com espaços em branco'
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