<?php
/**
 * Created by PhpStorm.
 * User: bac_b
 * Date: 11/09/2016
 * Time: 10:38 CH
 */
namespace common\helpers;

class DateTimeHelper
{
    /**
     * Format: dd/mm/YY to YY-mm-dd
     * @param $date_string
     * @param $symbol
     * @param $symbol_change
     * @return string
     */
    public static function format_date($date_string, $symbol, $symbol_change)
    {
        $date_string = str_replace($symbol, $symbol_change, $date_string);
        return explode($symbol_change, $date_string)[2] . $symbol_change . explode($symbol_change, $date_string)[1] .
            $symbol_change . explode($symbol_change, $date_string)[0];
    }

    public static function format_date_time($date_time_string, $symbol, $symbol_change)
    {
        $date = explode(' ', $date_time_string)[0];
        $time = explode(' ', $date_time_string)[1];
        return self::format_date($date, $symbol, $symbol_change) . ' ' . $time;
    }
}