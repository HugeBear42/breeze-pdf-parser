<?php

namespace App\Breeze;

class BreezeReader
{

    public function __construct()
    {
    }

    public function returnTrue(): bool
    {
        return true;
    }

    public function return1(): int
    {
        return 1;
    }

    /**
     * @param float|int $a
     * @param float|int $b
     * @return float|int
     */
    public function multiply(float|int $a, float|int $b): float|int
    {
        return $a * $b;
    }

}