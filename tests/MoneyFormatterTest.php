<?php

namespace Nfq;

use PHPUnit\Framework\TestCase;

class MoneyFormatterTest extends TestCase
{
    /**
     * @var MoneyFormatter
     */
    private $sut;

    public function setUp(): void
    {
        $this->sut = new MoneyFormatter($this->getNumberFormatterMock());
    }

    /**
     * @dataProvider eurProvider()
     * @param $number
     * @param $expected
     */
    public function testFormatEur($number, $expected)
    {
        $actual = $this->sut->formatEur($number);
        $this->assertSame($expected, $actual);
    }

    /**
     * @dataProvider usdProvider()
     * @param $number
     * @param $expected
     */
    public function testFormatUsd($number, $expected)
    {
        $actual = $this->sut->formatUsd($number);
        $this->assertSame($expected, $actual);
    }

    private function getNumberFormatterMock(): NumberFormatter
    {
        $mock = $this->getMockBuilder(NumberFormatter::class)
            ->getMock();

        $mock->method('formatNumber')
            ->with(2835779)
            ->willReturn('2.84M');

        return $mock;
    }

    public function eurProvider()
    {
        return [
            [2835779, '2.84M €'],
        ];
    }

    public function usdProvider()
    {
        return [
            [2835779, '$2.84M'],
        ];
    }
}
