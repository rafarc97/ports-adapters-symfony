<?php

declare(strict_types=1);

namespace App\Tests\example\application;

use App\example\application\NumberProcessor;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

class NumberProcessorTest extends TestCase
{

    #[DataProvider('additionProvider')]
    #[TestDox('Adding $a to $b results in $expected')] 
    function test_sum(int $expected, int $a, int $b): void
    {
        $numberProcessor = new NumberProcessor();
        $result = $numberProcessor->sum($a,$b);

        $this->assertSame($expected, $result);
    }

    public static function additionProvider(): array
    {
        return [
            'data set 1' => [0, 0, 0],
            'data set 2' => [2, 1, 1],
            'data set 3' => [1, 0, 1],
            'data set 4' => [4, 1, 3]
        ];
    }
}