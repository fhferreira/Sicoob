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
}
