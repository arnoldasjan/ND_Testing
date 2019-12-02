<?php

namespace Nfq;

use PHPUnit\Framework\TestCase;

class NumberFormatterTest extends TestCase
{
    private $sut;

    public function setUp(): void
    {
        $this->sut = new NumberFormatter();
    }

    /**
     * @dataProvider millionsProvider()
     * @param $number
     * @param $expected
     */
    public function testMillionsNumberFormatter($number, $expected)
    {
        $actual = $this->sut->formatNumber($number);
        $this->assertSame($expected, $actual);
    }

    /**
     * @dataProvider thousandsProvider()
     * @param $number
     * @param $expected
     */
    public function testThousandsNumberFormatter($number, $expected)
    {
        $actual = $this->sut->formatNumber($number);
        $this->assertSame($expected, $actual);
    }

    /**
     * @dataProvider wholesProvider()
     * @param $number
     * @param $expected
     */
    public function testWholesNumberFormatter($number, $expected)
    {
        $actual = $this->sut->formatNumber($number);
        $this->assertSame($expected, $actual);
    }

    /**
     * @dataProvider othersProvider()
     * @param $number
     * @param $expected
     */
    public function testOthersNumberFormatter($number, $expected)
    {
        $actual = $this->sut->formatNumber($number);
        $this->assertSame($expected, $actual);
    }

    /**
     * @dataProvider negativesProvider()
     * @param $number
     * @param $expected
     */
    public function testNegativesNumberFormatter($number, $expected)
    {
        $actual = $this->sut->formatNumber($number);
        $this->assertSame($expected, $actual);
    }

    public function millionsProvider()
    {
        return [
            [2835779, '2.84M'],
            [999500, '1.00M'],
        ];
    }

    public function thousandsProvider()
    {
        return [
            [535216, '535K'],
            [99950, '100K'],
        ];
    }

    public function wholesProvider()
    {
        return [
            [27533.78, '27 534'],
        ];
    }

    public function othersProvider()
    {
        return [
            [533.1, '533.10'],
            [66.6666, '66.67'],
            [12.00, '12']
        ];
    }

    public function negativesProvider()
    {
        return [
            [-123654.89, '-124K'],
        ];
    }
}
