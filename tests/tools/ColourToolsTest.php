<?php

namespace App\Test\tools;

use App\tools\ColourTools;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class ColourToolsTest extends TestCase
{
    public function testCMYK2RGB()
    {
        $colourTools = new ColourTools();
        $result = $colourTools->cmyk2rgb(20, 20, 20, 100);
        assertEquals(0, $result[0]);
        assertEquals(0, $result[1]);
        assertEquals(0, $result[2]);

        $result = $colourTools->cmyk2rgb(100, 100, 100, 0);
        assertEquals(0, $result[0]);
        assertEquals(0, $result[1]);
        assertEquals(0, $result[2]);

        $result = $colourTools->cmyk2rgb(0, 0, 0, 0);
        assertEquals(255, $result[0]);
        assertEquals(255, $result[1]);
        assertEquals(255, $result[2]);

        $result = $colourTools->cmyk2rgb(10, 30, 55, 20);
        assertEquals(184, $result[0]);
        assertEquals(143, $result[1]);
        assertEquals( 92, $result[2]);

        $result = $colourTools->cmyk2rgb(80, 30, 10, 20);
        assertEquals( 41, $result[0]);
        assertEquals(143, $result[1]);
        assertEquals(184, $result[2]);
    }


    public function testRGB2CMYK()
    {
        $colourTools = new ColourTools();
        $result = $colourTools->rgb2cmyk(0, 0, 0);
        assertEquals(  0, $result[0]);
        assertEquals(  0, $result[1]);
        assertEquals(  0, $result[2]);
        assertEquals(100, $result[3]);

        $result = $colourTools->rgb2cmyk(184, 143, 92);
        assertEquals( 0, $result[0]);
        assertEquals(22, $result[1]);
        assertEquals(50, $result[2]);
        assertEquals(28, $result[3]);

        $result = $colourTools->rgb2cmyk(41, 143, 184);
        assertEquals(78, $result[0]);
        assertEquals(22, $result[1]);
        assertEquals( 0, $result[2]);
        assertEquals(28, $result[3]);

        $result = $colourTools->rgb2cmyk(255, 255, 255);
        assertEquals(  0, $result[0]);
        assertEquals(  0, $result[1]);
        assertEquals(  0, $result[2]);
        assertEquals(0, $result[3]);
    }
}
