<?php

namespace App\Breeze;

class BreezeReader
{

    public function __construct()
    {
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

    public function divide(float|int $a, float|int $b): float|int
    {
        return $a / $b;
    }

}