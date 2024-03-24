<?php

declare(strict_types=1);

namespace App\example\application;

final class NumberProcessor
{
    public function sum(int ...$numbers): int
    {
        $total = 0;
        foreach ($numbers as $number){
            $total += $number;
        }
        return $total;
    }
}