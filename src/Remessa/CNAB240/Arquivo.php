<?php

namespace Sicoob\Remessa\CNAB240;

class Arquivo {

    public $lote;
    //Header de Arquivo
    public $header;
    //Header de Lote
    public $headerLote;
    //Segmentos P,Q,R,S -> Boletos
    public $boletos = [];
    //Trailer de Lote
    public $trailerLote;
    //Trailer de Arquivo
    public $trailer;
    public $renderedData;

    public $lines = [];

    public function __construct($attributes = [])
    {
        $this->fill($attributes);
    }

    public function fill($attributes)
    {
        if (isset($attributes['lote']))   {
            $this->lote = $attributes['lote'];
            $attributes['header']['lote'] = 0;
            $attributes['header_lote']['lote'] = $this->lote;
        }
        $this->header = new HeaderArquivo(isset($attributes['header'])?$attributes['header']:[]);
        $this->headerLote = new HeaderLote(isset($attributes['header_lote'])?$attributes['header_lote']:[]);
        $this->trailerLote = new TrailerLote([]);
        $this->trailer = new TrailerArquivo([]);
    }

    public function addBoleto(Boleto $boleto)
    {
        array_push($this->boletos, $boleto);
    }

    public function render($join = true, $savePath = null, $returnPath = false)
    {
        array_push($this->lines, $this->header->render());
        array_push($this->lines, $this->headerLote->render());

        $sumBoletos = [];
        foreach($this->boletos as $boleto) {
            $sumBoletos[$boleto->count] = $boleto->valor;
            $boletoLines = $boleto->render();
            foreach($boletoLines as $line) {
                array_push($this->lines, $line);
            }
        }

        $calculatedSumBoletos = array_sum($sumBoletos);
        $countBoletos = count($sumBoletos);

        $dataLote = [
            'lote' => $this->lote,
            'quantidade_registros' => $countBoletos,
            'quantidade_titulos_simples' => $countBoletos,
            'valor_titulos_simples' => $calculatedSumBoletos
        ];
        $dataArquivo = [
            'quantidade_lotes' => 1,
            'quantidade_registros' => $countBoletos
        ];
        $this->trailerLote->fill($dataLote);
        $this->trailer->fill($dataArquivo);

        array_push($this->lines, $this->trailerLote->render());
        array_push($this->lines, $this->trailer->render());

        $this->renderedData = implode("\r\n", $this->lines);

        if ($savePath) {
            $path = $this->saveFile($savePath);
            if ($returnPath) {
                return $path;
            }
        }

        return $join ? $this->renderedData : $this->lines;
    }

    public function saveFile($filename)
    {
        if ($filename) {
            $fp = fopen($filename, "w");
            fwrite($fp, $this->renderedData);
            fclose($fp);
            return $filename;
        }
    }
}