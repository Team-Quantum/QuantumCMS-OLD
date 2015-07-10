<?php

namespace Quantum\Utils;

class StringUtils {

    /**
     * Checks if the given string ends with another string
     * @param $string String to check
     * @param $search String ends with
     * @return bool If the string ends with the given string
     */
    public static function endsWith($string, $search) {
        if($search === '') {
            return true;
        }
        if(strlen($search) > strlen($string)) {
            echo 'search > string';
            return false;
        }

        $pos = strpos($string, $search, strlen($string) - strlen($search));

        return $pos !== false;
    }

}