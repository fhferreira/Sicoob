<?php

namespace Sicoob\Retorno\CNAB240;

class SegmentU
{
    /*
    01.3U	1	3	3	-	Num	Controle	Banco			Código do Sicoob na Compensação: "756"
    02.3U	4	7	4	-	Num		Lote			"Lote de Serviço: Número seqüencial para identificar univocamente um lote de serviço. Criado e controlado pelo responsável pela geração magnética dos dados contidos no arquivo.
    Preencher com '0001' para o primeiro lote do arquivo. Para os demais: número do lote anterior acrescido de 1. O número não poderá ser repetido dentro do arquivo."
    03.3U	8	8	1	-	Num		Registro			Tipo de Registro: "3"
    04.3U	9	13	5	-	Num	"
    Serviço"	Nº do Registro			"Nº Sequencial do Registro no Lote: Número adotado e controlado pelo responsável pela geração magnética dos dados contidos no arquivo, para identificar a seqüência de registros encaminhados no lote. Deve ser inicializado sempre em '1', em cada novo lote.
    "
    05.3U	14	14	1	-	Alfa		Segmento			Cód. Segmento do Registro Detalhe: "U"
    06.3U	15	15	1	-	Alfa		CNAB			Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco
    07.3U	16	17	2	-	Num		Código de Movimento Retorno			"Código de Movimento de Retorno
    '02' = Entrada Confirmada
    '03' = Entrada Rejeitada
    '04' = Transferência de Carteira/Entrada
    '05' = Transferência de Carteira/Baixa
    '06' = Liquidação
    '07' = Confirmação do Recebimento da Instrução de Desconto
    '08' = Confirmação do Recebimento do Cancelamento do Desconto
    '09' = Baixa
    '11' = Títulos em Carteira (Em Ser)
    '12' = Confirmação Recebimento Instrução de Abatimento
    '13' = Confirmação Recebimento Instrução de Cancelamento Abatimento
    '14' = Confirmação Recebimento Instrução Alteração de Vencimento
    '15' = Franco de Pagamento
    '17' = Liquidação Após Baixa ou Liquidação Título Não Registrado
    '19' = Confirmação Recebimento Instrução de Protesto
    '20' = Confirmação Recebimento Instrução de Sustação/Cancelamento de Protesto
    '23' = Remessa a Cartório (Aponte em Cartório)
    '24' = Retirada de Cartório e Manutenção em Carteira
    '25' = Protestado e Baixado (Baixa por Ter Sido Protestado)
    '26' = Instrução Rejeitada
    '27' = Confirmação do Pedido de Alteração de Outros Dados
    '28' = Débito de Tarifas/Custas
    '29' = Ocorrências do Pagador
    '30' = Alteração de Dados Rejeitada
    '33' = Confirmação da Alteração dos Dados do Rateio de Crédito
    '34' = Confirmação do Cancelamento dos Dados do Rateio de Crédito
    '35' = Confirmação do Desagendamento do Débito Automático
    '36' = Confirmação de envio de e-mail/SMS
    '37' = Envio de e-mail/SMS rejeitado
    '38' = Confirmação de alteração do Prazo Limite de Recebimento (a data deve ser
    '39' = Confirmação de Dispensa de Prazo Limite de Recebimento"
                                    "'40' = Confirmação da alteração do número do título dado pelo beneficiário
    '41' = Confirmação da alteração do número controle do Participante
    '42' = Confirmação da alteração dos dados do Pagador
    '43' = Confirmação da alteração dos dados do Sacador/Avalista
    '44' = Título pago com cheque devolvido
    '45' = Título pago com cheque compensado
    '46' = Instrução para cancelar protesto confirmada
    '47' = Instrução para protesto para fins falimentares confirmada
    '48' = Confirmação de instrução de transferência de carteira/modalidade de cobrança
    '49' = Alteração de contrato de cobrança
    '50' = Título pago com cheque pendente de liquidação
    '51' = Título DDA reconhecido pelo pagador
    '52' = Título DDA não reconhecido pelo pagador
    '53' = Título DDA recusado pela CIP
    '54' = Confirmação da Instrução de Baixa de Título Negativado sem Protesto
    '55' = Confirmação de Pedido de Dispensa de Multa
    '56' = Confirmação do Pedido de Cobrança de Multa
    '57' = Confirmação do Pedido de Alteração de Cobrança de Juros
    '58' = Confirmação do Pedido de Alteração do Valor/Data de Desconto
    '59' = Confirmação do Pedido de Alteração do Beneficiário do Título
    '60' = Confirmação do Pedido de Dispensa de Juros de Mora"
    08.3U	18	32	13	2	Num	Dados do Título	Acréscimos			Valor dos Juros / Multa / Encargos: Valor dos acréscimos efetuados no título de cobrança, expresso em moeda corrente.
    09.3U	33	47	13	2	Num		Desconto			Valor dos descontos efetuados no título de cobrança, expresso em moeda corrente.
    10.3U	48	62	13	2	Num		Abatimento			Valor dos abatimentos efetuados ou cancelados no título de cobrança, expresso em moeda corrente.
    11.3U	63	77	13	2	Num		IOF			"Valor do IOF - Imposto sobre Operações Financeiras - recolhido sobre o Título, expresso
    em moeda corrente."
    12.3U	78	92	13	2	Num		Valor Pago			"Valor do pagamento efetuado pelo Pagador referente ao título de cobrança, expresso em
    moeda corrente."
    13.3U	93	107	13	2	Num		Valor Líquido			Valor efetivo a ser creditado referente ao Título, expresso em moeda corrente.
    14.3U	108	122	13	2	Num	Outras Despesas				Valor efetivo de despesas referente ao título de cobrança, expresso em moeda corrente.
    15.3U	123	137	13	2	Num	Outros Créditos				Valor efetivo de créditos referente ao título de cobrança, expresso em moeda corrente.
    16.3U	138	145	8	-	Num	Data da Ocorrência				"Data do evento que afeta o estado do título de cobrança.
    Utilizar o formato DDMMAAAA, onde:
    DD = dia
    MM = mês
    AAAA = ano"
    17.3U	146	153	8	-	Num	Data do Crédito				"Data do evento que afeta o estado do título de cobrança.
    Utilizar o formato DDMMAAAA, onde:
    DD = dia
    MM = mês
    AAAA = ano"
    18.3U	154	157	4	-	Alfa	Ocorr. do Pagador	Código			o sistema retorna com as posições em branco
    19.3U	158	165	8	-	Alfa		Data Ocorrência			Data Ocorrência:" 00000000"
    20.3U	166	180	13	2	Num		Valor Ocorrência			Valor da Ocorrência: "000000000000000"
    21.3U	181	210	30	-	Alfa		Compl. da Ocorrência			o sistema retorna com as posições em branco
    22.3U	211	213	3	-	Num	Código do Banco Correspondente				"Cód. Bco. Corresp. na Compensação: Caso o Beneficiário não tenha contratado a opção de Banco Correspondente com o Sicoob, virá preenchido com '756';
    Caso o Beneficiário tenha contratado a opção de Banco Correspondente com o Sicoob virá preenchido com '001' (Banco do Brasil)"
    23.3U	214	233	20	-	Num	N Número Banco Correspondnete				Código fornecido pelo Banco Correspondente para identificação do Título de Cobrança.
    24.3U	234	240	7	-	Alfa	CNAB				Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco
    */
}