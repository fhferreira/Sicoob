<?php

namespace Sicoob\Retorno\CNAB240;

class Header extends LineAbstract
{

    /*
    01.0	001	003	003	-	Num	Controle¹	Banco	Código do Sicoob na Compensação: "756"
    02.0	004	007	004	-	Num		Lote			Lote de Serviço: "0000"
    03.0	008	008	001	-	Num		Registro		Tipo de Registro: "0"
    04.0	009	017	009	-	Alfa	CNAB			Uso Exclusivo FEBRABAN / CNAB: o sistema retorna com as posições em branco
    05.0	018	018	001	-	Num	Empresa²	Inscrição	Tipo	"Tipo de Inscrição da Empresa:
                            '1'  =  CPF
                            '2'  =  CGC / CNPJ"
    06.0	019	032	014	-	Num		Número		Número de Inscrição da Empresa
    07.0	033	052	020	-	Alfa	Convênio			Código do Convênio no Sicoob: o sistema retorna com as posições em branco
    08.0	053	057	005	-	Num		Conta Corrente³	Agência	Código	Prefixo da Cooperativa: vide planilha "Contracapa" deste arquivo
    09.0	058	058	001	-	Alfa	DV	Dígito Verificador do Prefixo: o sistema retorna preenchimento com zero "0"
    10.0	059	070	012	-	Num		Conta	Número	Conta Corrente: vide planilha "Contracapa" deste arquivo
    11.0	071	071	001	-	Alfa    DV	Dígito Verificador da Conta: vide planilha "Contracapa" deste arquivo
    12.0	072	072	001	-	Alfa	DV	Dígito Verificador da Ag/Conta: o sistema retorna com as posições em branco
    13.0	073	102	030	-	Alfa	Nome Nome da Empresa
    14.0	103	132	030	-	Alfa	Nome do Banco Nome do Banco: SICOOB
    15.0	133	142	010	-	Alfa	CNAB 	Uso Exclusivo FEBRABAN / CNAB: o sistema retorna com as posições em branco
    16.0	143	143	001	-	Num	    Arquivo	Código			Código Remessa / Retorno: "2"
    17.0	144	151	008	-	Num		Data de Geração			Data de Geração do Arquivo
    18.0	152	157	006	-	Num		Hora de Geração			Hora de Geração do Arquivo
    19.0	158	163	006	-	Num		Seqüência (NSA)			Número Seqüencial do Arquivo: Número seqüencial adotado e controlado pelo responsável pela geração do arquivo para ordenar a disposição dos arquivos encaminhados. Evoluir um número seqüencial a cada header de arquivo.
    20.0	164	166	003	-	Num		Layout do Arquivo			No da Versão do Layout do Arquivo: "081"
    21.0	167	171	005	-	Num		Densidade			Densidade de Gravação do Arquivo: "00000"
    22.0	172	191	020	-	Alfa	Reservado Banco				Para Uso Reservado do Banco: o sistema retorna com as posições em branco
    23.0	192	211	020	-	Alfa	Reservado Empresa				Para Uso Reservado da Empresa: o sistema retorna com as posições em branco
    24.0	212	240	029	-	Alfa	CNAB				Uso Exclusivo FEBRABAN / CNAB: o sistema retorna com as posições em branco
    ¹	Controle - Banco origem ou destino do arquivo.
    ²	Empresa - Beneficiário que firmou o convênio de prestação de serviços com o Sicoob
    ³	Conta Corrente (Empresa) - Número da conta do corrente do convênio firmado entre Sicoob e Beneficiário para a prestação do serviço de cobrança.
    */
}