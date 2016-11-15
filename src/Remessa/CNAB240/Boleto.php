<?php
namespace Sicoob\Remessa\CNAB240;

use Cnab\Remessa\Cnab240\SegmentoP;

class Boleto
{

    public $segmentP;
    public $segmentQ;
    public $segmentR;
    public $segmentS;

    public function __construct($attributes)
    {
        $this->setSegment('P', $attributes['segmentP']);
        $this->setSegment('Q', $attributes['segmentQ']);
        $this->setSegment('R', $attributes['segmentR']);
        $this->setSegment('S', $attributes['segmentS']);
    }

    public function setSegment($type, $attributes = [])
    {
        $this->segment{$type} = new Segment{$type}($attributes);
    }

    public function getSegment($type)
    {
        return $this->segment{$type};
    }

    public function render()
    {
        $rendered = [];
        $rendered[] = $this->getSegment('P')->render();
        $rendered[] = $this->getSegment('Q')->render();
        $rendered[] = $this->getSegment('R')->render();
        $rendered[] = $this->getSegment('S')->render();
        return implode('\r\n', $rendered);
    }
}