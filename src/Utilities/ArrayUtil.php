<?php

namespace jamesvweston\USPS\Utilities;


class ArrayUtil
{

    public static function get (&$var, $default = null)
    {
        return isset($var) ? $var : $default;
    }

    public static function all($array, $predicate) 
    {
        return array_filter($array, $predicate) === $array;
    }

    public static function isArrays($array)
    {
        return ArrayUtil::all($array, 'is_array');
    }
}