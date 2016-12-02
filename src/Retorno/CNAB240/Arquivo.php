<?php

namespace Sicoob\Retorno\CNAB240;

use Exception;

class Arquivo
{
    public $filename;

    public $header;

    public $headerLote;

    public $lines = [];

    public $boletos = [];

    public $trailerLote;

    public $trailer;

    public function __construct($filename = null)
    {
        if ($filename) {
            $this->fill($filename);
        }
    }

    public function fill($filename)
    {
        if (!$filename || !file_exists($filename)) {
            throw new Exception("O Arquivo não foi encontrado ou o caminho informado está inválido.");
        }

        $this->filename = $filename;
        $this->parseFileToArray();
        $this->parseHeaderAndTrailer();
        $this->parseBoletos();
    }

    public function parseFileToArray()
    {
        $file = fopen($this->filename, "r");
        $lines = [];
        while (!feof($file)) {
            $line = fgets($file);
            $line = ltrim($line);
            $line = str_replace("\r\n","", $line);
            if ($line) {
                $lines[] = $line;
            }
        }
        fclose($file);
        $this->lines = $lines;
    }

    public function parseHeaderAndTrailer()
    {
        //First Line Header
        $header = array_shift($this->lines);
        $this->header = new Header($header);

        //Second Line Header Lote
        $headerLote = array_shift($this->lines);
        $this->headerLote = new HeaderLote($headerLote);

        //Last Trailer
        $trailer = array_pop($this->lines);
        $this->trailer = new Trailer($trailer);

        //Until Last Trailer Lote
        $trailerLote = array_pop($this->lines);
        $this->trailerLote = new TrailerLote($trailerLote);
    }

    public function parseBoletos()
    {
        $total = count($this->lines);
        for ($i = 0; $i < $total; $i++) {
            $lineT = $this->lines[$i];
            $i++;
            $lineU = $this->lines[$i];
            $boleto = new Boleto($lineT, $lineU);
            $this->addBoleto($boleto);
        }
    }

    public function addBoleto(Boleto $boleto)
    {
        array_push($this->boletos, $boleto);
    }

}