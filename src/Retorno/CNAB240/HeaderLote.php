<?php

namespace Sicoob\Retorno\CNAB240;

class HeaderLote extends LineAbstract
{
    /*
    01.1	001	003	003	-	Num	Controle	Banco			Código do Banco na Compensação: "756"
    02.1	004	007	004	-	Num		Lote			"Lote de Serviço: Número seqüencial para identificar univocamente um lote de serviço. Criado e controlado pelo responsável pela geração magnética dos dados contidos no arquivo.
    Preencher com '0001' para o primeiro lote do arquivo. Para os demais: número do lote anterior acrescido de 1. O número não poderá ser repetido dentro do arquivo."
    03.1	008	008	001	-	Num		Registro			Tipo de Registro: "1"
    04.1	009	009	001	-	Alfa	Serviço	Operação			Tipo de Operação: "T"
    05.1	010	011	002	-	Num		Serviço			Tipo de Serviço: "01"
    06.1	012	013	002	-	Alfa		CNAB			Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco
    07.1	014	016	003	-	Num		Layout do Lote			Nº da Versão do Layout do Lote: "044"
    08.1	017	017	001	-	Alfa	CNAB				Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco
    09.1	018	018	001	-	Num	Empresa	Inscrição	Tipo		"Tipo de Inscrição da Empresa:
    '1'  =  CPF
    '2'  =  CGC / CNPJ"
    10.1	019	033	015	-	Num			Número		Nº de Inscrição da Empresa
    11.1	034	053	020	-	Alfa		Convênio			Código do Convênio no Banco: o sistema retorna com as posições em branco
    12.1	054	058	005	-	Num		C/C	Agência	Código	Prefixo da Cooperativa: vide planilha "Contracapa" deste arquivo
    13.1	059	059	001	-	Alfa				DV	Dígito Verificador do Prefixo: o sistema retorna preenchimento com zero "0"
    14.1	060	071	012	-	Num			Conta	Número	Conta Corrente: vide planilha "Contracapa" deste arquivo
    15.1	072	072	001	-	Alfa				DV	Dígito Verificador da Conta: vide planilha "Contracapa" deste arquivo
    16.1	073	073	001	-	Alfa			DV		Dígito Verificador da Ag/Conta: o sistema retorna com as posições em branco
    17.1	074	103	030	-	Alfa		Nome			Nome da Empresa
    18.1	104	143	040	-	Alfa	Informação 1				Mensagem 1: Estes campos não serão utilizados no arquivo retorno.
    19.1	144	183	040	-	Alfa	Informação 2				Mensagem 2: Estes campos não serão utilizados no arquivo retorno.
    20.1	184	191	008	-	Num	Controle da Cobrança		Nº Rem./Ret.		Número Remessa/Retorno: Número adotado e controlado pelo responsável pela geração magnética dos dados contidos no arquivo para identificar a seqüência de envio ou devolução do arquivo entre o Beneficiário e o Sicoob.
    21.1	192	199	008	-	Num			Dt. Gravação		Data de Gravação Remessa/Retorno
    22.1	200	207	008	-	Num	Data do Crédito				"Data do Crédito: Data de efetivação do crédito referente ao pagamento do título de cobrança. Informação enviada somente no arquivo de retorno.
                            Utilizar o formato DDMMAAAA, onde:
                            DD         =  dia
                            MM        =  mês
                            AAAA   =  ano"
    23.1	208	240	033	-	Alfa	CNAB				Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco
    */
}