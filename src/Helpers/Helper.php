<?php
namespace Sicoob\Helpers;

/**
 * Class Helper
 * @package Sicoob\Helpers
 */
class Helper
{
    /**
     * @param $character
     * @param $value
     * @param $size
     * @param $side
     * @return string
     */
    public static function completeSize($character, $value, $size, $side)
    {
        return str_pad($value, $size, $character, $side);
    }

    /**
     * @param $value
     * @return float
     */
    public static function removePoints($value)
    {
        return round(100 * $value);
    }

    /**
     * @param $count
     * @param $type
     * @return int
     */
    public static function calculateRegister($count, $type)
    {
        $calculated = 0;
        if ($type == 'P') {
            $calculated = ($count * 4) - 3;
        } elseif ($type == 'Q') {
            $calculated = ($count * 4) - 2;
        } elseif ($type == 'R') {
            $calculated = ($count * 4) - 1;
        } elseif ($type == 'S') {
            $calculated = ($count * 4);
        }
        return $calculated;
    }

    public static function calculateStartAndLength($start, $end) {
        return [
            'start' => $start - 1,
            'length' => ($end - $start) + 1,
        ];
    }

    public static function cutInterval($string, $start, $end)
    {
        $positions = self::calculateStartAndLength($start, $end);
        return substr($string, $positions['start'], $positions['length']);
    }

    public static function formatNossoNumero($value)
    {
        $NumTitulo = self::cutInterval($value, 1, 10);
        $Parcela = self::cutInterval($value, 11, 12);
        $Modalidade = self::cutInterval($value, 13, 14);
        $TipoFormulario = self::cutInterval($value, 15, 15);
        $Brancos = self::cutInterval($value, 16, 20);

        return [
            'numTitulo' => $NumTitulo,
            'parcela' => $Parcela,
            'modalidade' => $Modalidade,
            'tipo_formulario' => $TipoFormulario,
            'brancos' => $Brancos,
        ];
    }

}
