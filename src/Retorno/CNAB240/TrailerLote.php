<?php

namespace Sicoob\Retorno\CNAB240;

class TrailerLote extends LineAbstract
{
    /*
    01.5	001	003	003	-	Num	Controle	Banco			Código do Banco na Compensação: "756"
    02.5	004	007	004	-	Num		Lote			"Lote de Serviço: Número seqüencial para identificar univocamente um lote de serviço. Criado e controlado pelo responsável pela geração magnética dos dados contidos no arquivo.
                            Preencher com '0001' para o primeiro lote do arquivo. Para os demais: número do lote anterior acrescido de 1. O número não poderá ser repetido dentro do arquivo."
    03.5	008	008	001	-	Num		Registro			Tipo de Registro: "5"
    04.5	009	017	009	-	Alfa	CNAB				Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco
    05.5	018	023	006	-	Num	Qtde de Registros				Quantidade de Registros no Lote:
    06.5	024	029	006	-	Num	Totalização da Cobrança Simples				Quantidade de Títulos em Cobrança
    07.5	030	046	015	002	Num					Valor Total dosTítulos em Carteiras
    08.5	047	052	006	-	Num	Totalização da Cobrança Vinculada				Quantidade de Títulos em Cobrança
    09.5	053	069	015	002	Num					Valor Total dosTítulos em Carteiras
    10.5	070	075	006	-	Num	Totalização da Cobrança Caucionada				Quantidade de Títulos em Cobrança
    11.5	076	092	015	002	Num					Quantidade de Títulos em Carteiras
    12.5	093	098	006	-	Nim	Totalização da Cobrança Descontada				Quantidade de Títulos em Cobrança
    13.5	099	115	015	002	Num					Valor Total dosTítulos em Carteiras
    14.5	116	123	008	-	Alfa	N. do Aviso				Número do Aviso de Lançamento: o sistema retorna com as posições em branco
    15.5	124	240	117	-	Alfa	CNAB				Uso Exclusivo FEBRABAN/CNAB: o sistema retorna com as posições em branco
    */
}