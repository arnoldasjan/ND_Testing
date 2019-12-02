<?php


namespace Nfq;


class MoneyFormatter
{
    /**
     * @var NumberFormatter
     */
    private $numberFormatter;

    public function __construct(NumberFormatter $numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }

    public function formatEur($number) {
        $newNumber = $this->numberFormatter->formatNumber($number);
        return $newNumber . " €";
    }

    public function formatUsd($number) {
        $newNumber = $this->numberFormatter->formatNumber($number);
        return "$" . $newNumber;
    }
}