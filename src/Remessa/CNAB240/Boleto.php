<?php
namespace Sicoob\Remessa\CNAB240;

use Sicoob\Helpers\Helper;
use Sicoob\Remessa\CNAB240\SegmentP;
use Sicoob\Remessa\CNAB240\SegmentQ;
use Sicoob\Remessa\CNAB240\SegmentR;
use Sicoob\Remessa\CNAB240\SegmentS;

/**
 * Class Boleto
 * @package Sicoob\Remessa\CNAB240
 */
class Boleto
{
    /**
     * @var int
     */
    public $count = 1;
    /**
     * @var int
     */
    public $lote = 1;
    /**
     * @var int
     */
    public $valor = 0;

    /**
     * @var
     */
    public $segmentP;
    /**
     * @var
     */
    public $segmentQ;
    /**
     * @var
     */
    public $segmentR;
    /**
     * @var
     */
    public $segmentS;

    /**
     * Boleto constructor.
     * @param $attributes
     */
    public function __construct($attributes = [])
    {
        $this->fill($attributes);
    }

    /**
     * @param $attributes
     */
    public function fill($attributes)
    {
        if (isset($attributes['valor'])) {
            $this->valor = $attributes['valor'];
            unset($attributes['valor']);
        }

        if (isset($attributes['count'])) {
            $this->count = $attributes['count'];
            unset($attributes['count']);
        }

        if (isset($attributes['lote'])) {
            $this->lote = $attributes['lote'];
            unset($attributes['lote']);
        }

        $this->setSegment('P', isset($attributes['segmentP']) ? $attributes['segmentP'] : []);
        $this->setSegment('Q', isset($attributes['segmentQ']) ? $attributes['segmentQ'] : []);
        $this->setSegment('R', isset($attributes['segmentR']) ? $attributes['segmentR'] : []);
        $this->setSegment('S', isset($attributes['segmentS']) ? $attributes['segmentS'] : []);
    }

    /**
     * @param $type
     * @param array $attributes
     */
    public function setSegment($type, $attributes = [])
    {
        $attributes['registro_item'] = Helper::calculateRegister($this->count, $type);
        $attributes['lote'] = $this->lote;
        switch ($type) {
            case 'P':
                $attributes['valor_nominal'] = $this->valor;
                $this->segmentP = new SegmentP($attributes);
                break;
            case 'Q':
                $this->segmentQ = new SegmentQ($attributes);
                break;
            case 'R':
                $this->segmentR = new SegmentR($attributes);
                break;
            case 'S':
                $this->segmentS = new SegmentS($attributes);
                break;
        }
    }

    /**
     * @param $type
     * @return mixed
     */
    public function getSegment($type)
    {
        return $this->{"segment" . $type};
    }


    /**
     * @param bool $joined
     * @return array|string
     */
    public function render($joined = false)
    {
        $rendered = [];
        $rendered[] = $this->getSegment('P')->render();
        $rendered[] = $this->getSegment('Q')->render();
        $rendered[] = $this->getSegment('R')->render();
        $rendered[] = $this->getSegment('S')->render();
        return $joined ? implode("\r\n", $rendered) : $rendered;
    }
}