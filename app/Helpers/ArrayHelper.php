<?php

namespace App\Helpers;

class ArrayHelper
{
    public static function objArraySearch($array, $key, $value)
    {
        foreach($array as $arraySingle) {
            if($arraySingle->$key == $value) {
                return $arraySingle;
            }
        }
        return null;
    }
}
