<?php
namespace Sicoob\Remessa\CNAB240;

class SegmentP extends LineAbstract
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
            'seq' => '02.3P',
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
            'seq' => '03.3P',
            'start' => 8,
            'end' => 8,
            'size' => 1,
            'default' => '3',
            'type' => 'numeric',
            'description' => 'Tipo de Registro "3"'
        ],
        'registro_item' => [
            'seq' => '04.3P',
            'start' => 9,
            'end' => 13,
            'size' => 5,
            'default' => '00001',
            'type' => 'numeric',
            'description' => 'Nº Sequencial do Registro no Lote: 
                              Número adotado para identificar a sequência de registros encaminhados no lote. 
                              Preencher com \'00001\' para o primeiro segmento P do lote do arquivo. 
                              Para os demais: número do segmento anterior acrescido de 1.'
        ],
        'segmento' => [
            'seq' => '05.3P',
            'start' => 14,
            'end' => 14,
            'size' => 1,
            'default' => 'P',
            'type' => 'string',
            'description' => 'Cód. Segmento do Registro Detalhe: "P"'
        ],
        'cnab_1' => [
            'seq' => '06.3P',
            'start' => 15,
            'end' => 15,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Uso Exclusivo FEBRABAN/CNAB: Preencher com espaços em branco'
        ],
        'cod_movimentacao' => [
            'seq' => '07.3P',
            'start' => 16,
            'end' => 17,
            'size' => 2,
            'default' => '1',
            'type' => 'numeric',
            'description' => '"Código de Movimento Remessa:
                               \'01\'  =  Entrada de Títulos"'
        ],
        'num_cc_agencia_codigo' => [
            'seq' => '08.3P',
            'start' => 18,
            'end' => 22,
            'size' => 5,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Prefixo da Cooperativa: vide planilha "Contracapa" deste arquivo"'
        ],
        'digito_verificador' => [
            'seq' => '09.3P',
            'start' => 23,
            'end' => 23,
            'size' => 1,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Dígito Verificador do Prefixo: vide planilha "Contracapa" deste arquivo'
        ],
        'conta_corrente' => [
            'seq' => '10.3P',
            'start' => 24,
            'end' => 35,
            'size' => 12,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Conta Corrente: vide planilha "Contracapa" deste arquivo'
        ],
        'conta_corrente_dv' => [
            'seq' => '11.3P',
            'start' => 36,
            'end' => 36,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Dígito Verificador da Conta: vide planilha "Contracapa" deste arquivo'
        ],
        'digito_verificador_agencia_conta' => [
            'seq' => '12.3P',
            'start' => 37,
            'end' => 37,
            'size' => 1,
            'default' => '',
            'type' => 'string',
            'description' => 'Dígito Verificador da Ag/Conta: Preencher com espaços em branco'
        ],
        'nosso_numero' => [
            'seq' => '13.3P',
            'start' => 38,
            'end' => 57,
            'size' => 20,
            'default' => '',
            'type' => 'string_right',
            'description' => '"Nosso Número:
                                - Se emissão a cargo do Sicoob (vide planilha ""Contracapa"" deste arquivo):
                                      NumTitulo - 10 posições (1 a 10) = Preencher com zeros 000000000001011
                                      Parcela - 02 posições (11 a 12) - ""01"" se parcela única
                                      Modalidade - 02 posições (13 a 14) - vide planilha ""Contracapa"" deste arquivo
                                      Tipo Formulário - 01 posição  (15 a 15):
                                          ""1"" -auto-copiativo
                                          ""3"" -auto-envelopável
                                          ""4"" -A4 sem envelopamento
                                          ""6"" -A4 sem envelopamento 3 vias
                                     Em branco - 05 posições (16 a 20)
                                - Se emissão a cargo do Beneficiário (vide planilha ""Contracapa"" deste arquivo):
                                     NumTitulo - 10 posições (1 a 10): Vide planilha ""02.Especificações do Boleto"" deste arquivo item 3.13
                                     Parcela - 02 posições (11 a 12) - ""01"" se parcela única
                                     Modalidade - 02 posições (13 a 14) - vide planilha ""Contracapa"" deste arquivo
                                     Tipo Formulário - 01 posição  (15 a 15):
                                          ""1"" -auto-copiativo
                                          ""3"" -auto-envelopável
                                          ""4"" -A4 sem envelopamento
                                          ""6"" -A4 sem envelopamento 3 vias
                                     Em branco - 05 posições (16 a 20)"'
        ],
        'carteira' => [
            'seq' => '14.3P',
            'start' => 58,
            'end' => 58,
            'size' => 1,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Código da Carteira: vide planilha "Contracapa" deste arquivo'
        ],
        'cadastramento' => [
            'seq' => '15.3P',
            'start' => 59,
            'end' => 59,
            'size' => 1,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Forma de Cadastr. do Título no Banco: "0"'
        ],
        'documento' => [
            'seq' => '16.3P',
            'start' => 60,
            'end' => 60,
            'size' => 1,
            'default' => '0',
            'type' => 'string',
            'description' => 'Tipo de Documento: Preencher com espaços em branco'
        ],
        'tipo_emissao' => [
            'seq' => '17.3P',
            'start' => 61,
            'end' => 61,
            'size' => 1,
            'default' => '1',
            'type' => 'numeric',
            'description' => 'Identificação da Emissão do Boleto: 
                              \'1\'  =  Sicoob Emite
                              \'2\'  =  Beneficiário Emite'
        ],
        'distribuicao' => [
            'seq' => '18.3P',
            'start' => 62,
            'end' => 62,
            'size' => 1,
            'default' => '1',
            'type' => 'string',
            'description' => 'Distrib. Boleto: 
                              \'1\'  =  Sicoob Distribui
                              \'2\'  =  Beneficiário Distribui'
        ],
        'numero_documento' => [
            'seq' => '19.3P',
            'start' => 63,
            'end' => 77,
            'size' => 15,
            'default' => '',
            'type' => 'string',
            'description' => 'Número do Documento de Cobrança: 
                              Número adotado e controlado pelo Cliente, para identificar o título de cobrança. 
                              Informação utilizada pelo Sicoob para referenciar a identificação do documento objeto de cobrança. 
                              Poderá conter número de duplicata, no caso de cobrança de duplicatas; 
                              número da apólice, no caso de cobrança de seguros, etc.'
        ],
        'data_vencimento' => [
            'seq' => '20.3P',
            'start' => 78,
            'end' => 85,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Data de Vencimento do Título'
        ],
        'valor_nominal' => [
            'seq' => '21.3P',
            'start' => 86,
            'end' => 100,
            'size' => 15,
            'default' => '',
            'type' => 'money',
            'description' => 'Valor Nominal do Título'
        ],
        'agencia_encarregada' => [
            'seq' => '22.3P',
            'start' => 101,
            'end' => 105,
            'size' => 5,
            'default' => '00000',
            'type' => 'numeric',
            'description' => 'Agência Encarregada da Cobrança: "00000"'
        ],
        'digito_agencia_encarregada' => [
            'seq' => '23.3P',
            'start' => 106,
            'end' => 106,
            'size' => 1,
            'default' => ' ',
            'type' => 'string',
            'description' => 'Dígito Verificador da Agência: Preencher com espaços em branco'
        ],
        'especie_titulo' => [
            'seq' => '24.3P',
            'start' => 107,
            'end' => 108,
            'size' => 2,
            'default' => '02',
            'type' => 'numeric',
            'description' => '\'01\'  =  CH Cheque
                              \'02\'  =  DM Duplicata Mercantil
                              \'03\'  =  DMI Duplicata Mercantil p/ Indicação
                              \'04\'  =  DS Duplicata de Serviço
                              \'05\'  =  DSI Duplicata de Serviço p/ Indicação
                              \'06\'  =  DR Duplicata Rural
                              \'07\'  =  LC Letra de Câmbio
                              \'08\'  =  NCC Nota de Crédito Comercial
                              \'09\'  =  NCE Nota de Crédito a Exportação
                              \'10\'  =  NCI Nota de Crédito Industrial
                              \'11\'  =  NCR Nota de Crédito Rural
                              \'12\'  =  NP Nota Promissória
                              \'13\'  =  NPR Nota Promissória Rural
                              \'14\'  =  TM Triplicata Mercantil
                              \'15\'  =  TS Triplicata de Serviço
                              \'16\'  =  NS Nota de Seguro
                              \'17\'  =  RC Recibo
                              \'18\'  =  FAT Fatura
                              \'19\'  =  ND Nota de Débito
                              \'20\'  =  AP Apólice de Seguro
                              \'21\'  =  ME Mensalidade Escolar
                              \'22\'  =  PC Parcela de Consórcio
                              \'23\'  =  NF Nota Fiscal
                              \'24\'  =  DD Documento de Dívida
                              \'25\'  =  Cédula de Produto Rural 
                              \'99\'  =  Outros"'
        ],
        'aceite' => [
            'seq' => '25.3P',
            'start' => 109,
            'end' => 109,
            'size' => 1,
            'default' => 'A',
            'type' => 'string',
            'description' => '"Identific. de Título Aceito/Não Aceito: 
                               Código adotado pela FEBRABAN para identificar se o título de cobrança foi aceito (reconhecimento da dívida pelo Pagador).
                               \'A\'  =  Aceite
                               \'N\'  =  Não Aceite"'
        ],
        'data_emissao' => [
            'seq' => '26.3P',
            'start' => 110,
            'end' => 117,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Data da Emissão do Título'
        ],
        'cod_juros_mora' => [
            'seq' => '27.3P',
            'start' => 118,
            'end' => 118,
            'size' => 1,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Código do Juros de Mora:
                                \'0\'  =  Isento
                                \'1\'  =  Valor por Dia
                                \'2\'  =  Taxa Mensal'
        ],
        'data_juros_mora' => [
            'seq' => '28.3P',
            'start' => 119,
            'end' => 126,
            'size' => 8,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Data do Juros de Mora: preencher com a Data de Vencimento do Título formato DDMMAAAA'
        ],
        'valor_juros_mora' => [
            'seq' => '29.3P',
            'start' => 127,
            'end' => 141,
            'size' => 15,
            'default' => 0,
            'type' => 'money',
            'description' => 'Juros de Mora por Dia/Taxa ao Mês
                                Valor = R$ ao dia
                                Taxa = % ao mês
                                Ex: 0000000000220 = 2,20%
                                Ex: 0000000001040 = 10,40%'
        ],
        'codigo_desconto_1' => [
            'seq' => '30.3P',
            'start' => 142,
            'end' => 142,
            'size' => 1,
            'default' => 0,
            'type' => 'numeric',
            'description' => 'Código do Desconto 1
                                \'0\' = Não Conceder desconto
                                \'1\' = Valor Fixo Até a Data Informada
                                \'2\' = Percentual Até a Data Informada'
        ],
        'data_desconto_1' => [
            'seq' => '31.3P',
            'start' => 143,
            'end' => 150,
            'size' => 8,
            'default' => 0,
            'type' => 'numeric',
            'description' => 'Data do Desconto 1'
        ],
        'valor_pencetual_desconto_1' => [
            'seq' => '32.3P',
            'start' => 151,
            'end' => 165,
            'size' => 15,
            'default' => 0,
            'type' => 'money',
            'description' => 'Valor/Percentual a ser Concedido'
        ],
        'valor_iof' => [
            'seq' => '33.3P',
            'start' => 166,
            'end' => 180,
            'size' => 15,
            'default' => 0,
            'type' => 'money',
            'description' => 'Valor do IOF a ser Recolhido'
        ],
        'valor_abatimento' => [
            'seq' => '34.3P',
            'start' => 181,
            'end' => 195,
            'size' => 15,
            'default' => 0,
            'type' => 'money',
            'description' => 'Valor do Abatimento'
        ],
        'empresa_beneficiario' => [
            'seq' => '35.3P',
            'start' => 196,
            'end' => 220,
            'size' => 25,
            'default' => '',
            'type' => 'string',
            'description' => 'Identificação do Título na Empresa: Campo destinado para uso do Beneficiário para identificação do Título.'
        ],
        'codigo_protesto' => [
            'seq' => '36.3P',
            'start' => 221,
            'end' => 221,
            'size' => 1,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Código para Protesto: "1"'
        ],
        'dias_protesto' => [
            'seq' => '37.3P',
            'start' => 222,
            'end' => 223,
            'size' => 2,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Número de Dias Corridos para Protesto'
        ],
        'codigo_baixa_devolucao' => [
            'seq' => '38.3P',
            'start' => 224,
            'end' => 224,
            'size' => 1,
            'default' => '0',
            'type' => 'numeric',
            'description' => 'Código para Baixa/Devolução: "0"'
        ],
        'prazo_baixa_devolucao' => [
            'seq' => '39.3P',
            'start' => 225,
            'end' => 227,
            'size' => 3,
            'default' => '',
            'type' => 'string',
            'description' => 'Número de Dias para Baixa/Devolução: Preencher com espaços em branco'
        ],
        'codigo_moeda' => [
            'seq' => '40.3P',
            'start' => 228,
            'end' => 229,
            'size' => 2,
            'default' => '09',
            'type' => 'numeric',
            'description' => 'Código da Moeda:
                              \'02\'  = Dólar Americano Comercial (Venda)
                              \'09\'  = Real'
        ],
        'contrato' => [
            'seq' => '41.3P',
            'start' => 230,
            'end' => 239,
            'size' => 10,
            'default' => '',
            'type' => 'numeric',
            'description' => 'Nº do Contrato da Operação de Créd.'
        ],
        'cnab_2' => [
            'seq' => '42.3P',
            'start' => 240,
            'end' => 240,
            'size' => 1,
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