<?php

function str_underscore($string)
{
    return preg_replace('/\s+/', '_', $string);
}

function parse_price($number)
{
    $number = str_replace('.', '', $number);
    $number = str_replace(',', '.', $number);

    return $number;
}
