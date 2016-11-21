<?php
namespace Sicoob\Remessa\CNAB240;

/**
 * Class HeaderArquivo
 * @package Sicoob\Remessa\CNAB240
 */
class HeaderArquivo extends LineAbstract
{
    /**
     * @var array
     */
    public $configs = [

        'banco' => [
            'seq' => '01.0',
            'start' => 1,
            'end' => 3,
            'size' => 3,
            'default' => 756,
            'type' => 'numeric',
            'description' => 'Código do Sicoob na Compensação: 756'
        ],
        'lote' => [
            'seq' => '02.0',
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
            'seq' => '03.0',
            'start' => 8,
            'end' => 8,
            'size' => 1,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Tipo de Registro "0"'
        ],
        'cnab_1' => [
            'seq' => '04.0',
            'start' => 9,
            'end' => 17,
            'size' => 9,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN / CNAB: Preencher com espaços em branco'
        ],
        'inscricao' => [
            'seq' => '05.0',
            'start' => 18,
            'end' => 18,
            'size' => 1,
            'default' => '1',
            'type' => 'numeric',
            'description' => 'Tipo de Inscrição da Empresa:
                             \'1\'  =  CPF
                             \'2\'  =  CGC / CNPJ'
        ],
        'numero_inscricao' => [
            'seq' => '06.0',
            'start' => 19,
            'end' => 32,
            'size' => 14,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Número de Inscrição da Empresa'
        ],
        'codigo_convenio' => [
            'seq' => '07.0',
            'start' => 33,
            'end' => 52,
            'size' => 20,
            'default' => '',
            'type' => 'string',
            'description' => 'Código do Convênio no Sicoob: Preencher com espaços em branco'
        ],
        'agencia_cooperativa' => [
            'seq' => '08.0',
            'start' => 53,
            'end' => 57,
            'size' => 5,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Conta Corrente³	Agência	Código	Prefixo da Cooperativa: vide planilha "Contracapa" deste arquivo'
        ],
        'dv_prefixo' => [
            'seq' => '09.0',
            'start' => 58,
            'end' => 58,
            'size' => 1,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Dígito Verificador do Prefixo: vide planilha "Contracapa" deste arquivo'
        ],
        'conta_corrente' => [
            'seq' => '10.0',
            'start' => 59,
            'end' => 70,
            'size' => 12,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Conta	Número	Conta Corrente: vide planilha "Contracapa" deste arquivo'
        ],
        'dv_conta_corrente' => [
            'seq' => '11.0',
            'start' => 71,
            'end' => 71,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Dígito Verificador da Conta: vide planilha "Contracapa" deste arquivo'
        ],
        'dv_ag_conta_corrente' => [
            'seq' => '12.0',
            'start' => 72,
            'end' => 72,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Dígito Verificador da Ag/Conta: Preencher com espaços em branco'
        ],
        'nome_empresa' => [
            'seq' => '13.0',
            'start' => 73,
            'end' => 102,
            'size' => 30,
            'default' => '',
            'type' => 'string_right',
            'description' => 'Nome da Empresa'
        ],
        'nome_banco' => [
            'seq' => '14.0',
            'start' => 103,
            'end' => 132,
            'size' => 30,
            'default' => 'SICOOB',
            'type' => 'string_right',
            'description' => 'Nome do Banco: SICOOB'
        ],
        'cnab_2' => [
            'seq' => '15.0',
            'start' => 133,
            'end' => 142,
            'size' => 10,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN / CNAB: Preencher com espaços em branco'
        ],
        'arquivo_codigo' => [
            'seq' => '16.0',
            'start' => 143,
            'end' => 143,
            'size' => 1,
            'default' => '1',
            'type' => 'numeric',
            'description' => 'Código Remessa / Retorno: "1"'
        ],
        'data_geracao' => [
            'seq' => '17.0',
            'start' => 144,
            'end' => 151,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Data de Geração do Arquivo'
        ],
        'hora_geracao' => [
            'seq' => '18.0',
            'start' => 152,
            'end' => 157,
            'size' => 6,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Hora de Geração do Arquivo'
        ],
        'sequencial' => [
            'seq' => '19.0',
            'start' => 158,
            'end' => 163,
            'size' => 6,
            'default' => '1',
            'type' => 'numeric',
            'description' => 'Número Seqüencial do Arquivo (NSA): Número seqüencial adotado e controlado pelo responsável pela geração do arquivo para ordenar a disposição dos arquivos encaminhados. 
                              Evoluir um número seqüencial a cada header de arquivo.'
        ],
        'layout_arquivo' => [
            'seq' => '20.0',
            'start' => 164,
            'end' => 166,
            'size' => 3,
            'default' => '081',
            'type' => 'numeric',
            'description' => 'No da Versão do Layout do Arquivo: "081"'
        ],
        'densidade' => [
            'seq' => '21.0',
            'start' => 167,
            'end' => 171,
            'size' => 5,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Densidade de Gravação do Arquivo: "00000"'
        ],
        'cnab_3' => [
            'seq' => '22.0',
            'start' => 172,
            'end' => 191,
            'size' => 20,
            'default' => '',
            'type' => 'string',
            'description' => 'Para Uso Reservado do Banco: Preencher com espaços em branco'
        ],
        'reservado_empresa' => [
            'seq' => '23.0',
            'start' => 192,
            'end' => 211,
            'size' => 20,
            'default' => '',
            'type' => 'string',
            'description' => 'Para Uso Reservado da Empresa: Preencher com espaços em branco'
        ],
        'cnab_4' => [
            'seq' => '24.0',
            'start' => 212,
            'end' => 240,
            'size' => 29,
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