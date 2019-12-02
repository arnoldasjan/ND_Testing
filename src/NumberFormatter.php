<?php


namespace Nfq;

class NumberFormatter
{
    public function formatNumber($number) {
        switch ($number) {
            case $number >= 999500 || $number <= -999500:
                return sprintf("%.2f",round(($number/1000000),2)) . 'M';
            case $number >= 99950 || $number <= -99950:
                return round(($number/1000),0) . 'K';
            case $number >= 999.9901 || $number <= -999.9901:
                return number_format($number,0, '', ' ');
            default:
                return round($number, 2) == intval($number) ? number_format($number, 0, '.', '') : number_format($number, 2, '.', '');
        }
    }
}