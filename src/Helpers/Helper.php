<?php
namespace Sicoob\Helpers;

class Helper {

    public static function completeSize($character, $value, $size, $side)
    {
        return str_pad($value, $size, $character, $side);
    }

    public static function removePoints($value)
    {
        return round(100 * $value);
    }

}