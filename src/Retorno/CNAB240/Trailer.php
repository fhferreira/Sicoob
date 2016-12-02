<?php

namespace Sicoob\Retorno\CNAB240;

class Trailer extends LineAbstract
{
    /*
    01.9	001	003	003	-	Num	Controle		Banco		Código do Banco na Compensação: "756"
    02.9	004	007	004	-	Num			Lote		Preencher com '9999'
    03.9	008	008	001	-	Num			Registro		Tipo de Registro: "9"
    04.9	009	017	009	-	Alfa	CNAB				Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco
    05.9	018	023	006	-	Num	Totais		Qtde. de Lotes		Quantidade de Lotes do Arquivo
    06.9	024	029	006	-	Num			Qtde. de Registros		Quantidade de Registros do Arquivo
    07.9	030	035	006	-	Num			Qtde. de Contas Concil.		Qtde de Contas p/ Conc. (Lotes): "000000"
    08.9	036	240	205	-	Alfa	CNAB				Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco
    */
}