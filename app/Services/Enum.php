<?php

namespace App\Services;

class Enum {

    /**
     *
     * USR_UNQ: Unique exceptions (throw new Exception()).
     * USR_USR: General exception. No feature, vendor or client bound specific.
     * USR_JWT: Jason Web Token exception. Related to JWT management.
     *
     */
    protected static $errors = [
        "USR_UNQ_00000" => 0,
        "USR_UNQ_00001" => 1,
        "USR_USR_00000" => 1000000000,
        "USR_USR_00001" => 1000000001,
        "USR_USR_00002" => 1000000002,
        "USR_USR_00003" => 1000000003,
        "USR_JWT_00000" => 1100000000,
        "USR_JWT_00001" => 1100000001,
    ];

    /**
     * Gets errors enum key by giving value.
     * 
     * @param int
     * @return string
     */
    public static function getName($value)
    {
        foreach (self::$errors as $k => $v) {
            if ($v === $value) {
                return $k;
            }
        }
    }

    /**
     * Gets errors enum value by giving key.
     * 
     * @param string
     * @return int
     */
    public static function getValue($key)
    {
        foreach (self::$errors as $k => $v) {
            if ($k === $key) {
                return $v;
            }
        }
    }
}
