<?php

namespace jamesvweston\USPS\Utilities;


class StringUtil
{

    /**
     * @param   string      $search
     * @param   string      $string
     * @return  bool
     */
    public static function hasValue($search, $string)
    {
        return preg_match('/' . $search . '/', $string);
    }
}