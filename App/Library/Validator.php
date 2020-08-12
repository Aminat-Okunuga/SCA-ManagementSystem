<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 12-Aug-20
 * Time: 8:35 AM
 */

namespace Library;


class Validator
{
    public static function validateText($field, $text, $max) {
        if(empty($text)) {
            return "$field must contain a valid value";
        }
        if(is_numeric($text)) {
            return "$field must not contain numbers";
        }
        if(strlen($text) > $max) {
            return "$field must contain $max characters or less";
        }
        return null;
    }

    public static function validateValue($field, $value) {
        if(empty($value)) {
            return "$field must contain a valid value";
        }
        return null;
    }

    public static function validateNumber($field, $number) {
        if(empty($number)) {
            return "$field must contain a valid value";
        }
        if(!filter_var($number, FILTER_VALIDATE_FLOAT)) {
            return "$field must contain a valid number";
        }
        return null;
    }


}