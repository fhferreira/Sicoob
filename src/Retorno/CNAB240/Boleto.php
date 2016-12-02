<?php

namespace Sicoob\Retorno\CNAB240;

class Boleto
{
    public $segmentT;

    public $segmentU;

    public $valor;

    public function __construct($segmentT = null, $segmentU = null)
    {
        if ($segmentT && $segmentU)
            $this->fill($segmentT, $segmentU);
    }

    public function fill($segmentT, $segmentU)
    {
        $this->segmentT = new SegmentT($segmentT);
        $this->segmentU = new SegmentU($segmentU);
        $this->valor = $this->segmentU->fields['valor_liquido']->value;
    }
}