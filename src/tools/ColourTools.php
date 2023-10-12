<?php

namespace App\tools;

class ColourTools
{
    /**
     * A method that converts rgb to cmyk values
     * rgb must be in the range 0->255
     * returns an array of 4 ints in the range 0->100
     *
     * @param int $r
     * @param int $g
     * @param int $b
     * @return int[]
     */
    public function rgb2cmyk(int $r, int $g, int $b): array
    {
        // Step 1, we "normalise" the CMYK values 0<=val<=100
        $r = $this->normaliseRGBKColour($r);
        $g = $this->normaliseRGBKColour($g);
        $b = $this->normaliseRGBKColour($b);

        // Step 2, we compute the key black component
        $k = 1 - max($r, $g, $b);
        $c = $m = $y = 0;
        // We calculate the CMY values
        if ($k != 1.0) {
            $c = (1.0 - $r - $k) / (1.0 - $k);
            $m = (1.0 - $g - $k) / (1.0 - $k);
            $y = (1.0 - $b - $k) / (1.0 - $k);
        }
        // Finally, we round the values to teh nearest int between 0 and 100
        $c = round($c * 100.0);
        $m = round($m * 100.0);
        $y = round($y * 100.0);
        $k = round($k * 100.0);
        //echo "c: {$c}, m: {$m}, y: {$y}, k: {$k}\n";
        $cmykArray = [$c, $m, $y, $k];

        return $cmykArray;
    }

    /**
     * @param int $colour
     * @return float
     */
    private function normaliseRGBKColour(int $colour): float
    {
        if ($colour > 255) {
            $colour = 255;
        } else if ($colour < 0) {
            $colour = 0;
        }

        return $colour / 255.0;
    }

    /**
     * A method that converts cmyk to rgb values
     * cmyk must be in the range 0->100
     * returns an array of 3 ints in the range 0->255
     *
     * @param int $c
     * @param int $m
     * @param int $y
     * @param int $k
     * @return int[]
     */
    public function cmyk2rgb(int $c, int $m, int $y, int $k)
    {
        // Step 1, we "normalise" the CMYK values 0<=val<=100
        $c = $this->normaliseCMYKColour($c);
        $m = $this->normaliseCMYKColour($m);
        $y = $this->normaliseCMYKColour($y);
        $k = $this->normaliseCMYKColour($k);
        // Step 2, we compute the RGB values
        $r = (1.0 - $c) * (1.0 - $k);
        $g = (1.0 - $m) * (1.0 - $k);
        $b = (1.0 - $y) * (1.0 - $k);
        // Step 3, we normalise the RGB values 0<=val<=255
        $r = intval(round($r * 255.0));
        $g = intval(round($g * 255.0));
        $b = intval(round($b * 255.0));
        //echo "r: {$r}, g: {$g}, b: {$b}\n";
        $rgbArray = [$r, $g, $b];

        return $rgbArray;
    }

    /**
     * @param int $colour
     * @return float
     */
    private function normaliseCMYKColour(int $colour): float
    {
        if ($colour > 100) {
            $colour = 100;
        } else if ($colour < 0) {
            $colour = 0;
        }

        return $colour / 100.0;
    }
}