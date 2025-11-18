<?php

class Validator
{
    //Validação campo em branco com corte de espaço em branco inicio e fim função pura
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && $value <= $max;
    }

    //validação de email
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
