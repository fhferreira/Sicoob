<?php

namespace Sicoob\Remessa\CNAB240;

class Arquivo {

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

    public function render($savePath = null)
    {
        $rendered = array();

        array_push($rendered, $this->header->render());
        array_push($rendered, $this->headerLote->render());

        foreach($this->boletos as $boleto) {
            array_push($rendered, $boleto->render());
        }

        array_push($rendered, $this->trailerLote->render());
        array_push($rendered, $this->trailer->render());

        $this->renderedData = implode("\r\n", $rendered);

        if ($savePath) {
            $fp = fopen($savePath, "w");
            fwrite($fp, $this->renderedData);
            fclose($fp);
            return $savePath;
        }

        return $this->renderedData;
    }
}