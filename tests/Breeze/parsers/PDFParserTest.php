<?php

namespace App\Test\Breeze\parsers;

use App\Breeze\BreezeReader;
use App\Breeze\parsers\PDFParser;
use PHPUnit\Framework\TestCase;

class PDFParserTest extends TestCase
{

    public function testIsWhiteSpace()
    {
        $parser=new PDFParser();
        self::assertTrue(condition: $parser->isWhiteSpace(c: 0), message: "testIsWhiteSpace(0)");
        self::assertFalse(condition: $parser->isWhiteSpace(c: 1), message: "testIsWhiteSpace(1)");
        self::assertFalse(condition: $parser->isWhiteSpace(c: 2), message: "testIsWhiteSpace(2)");
        self::assertFalse(condition: $parser->isWhiteSpace(c: 3), message: "testIsWhiteSpace(3)");
        self::assertFalse(condition: $parser->isWhiteSpace(c: 4), message: "testIsWhiteSpace(4)");
        self::assertFalse(condition: $parser->isWhiteSpace(c: 5), message: "testIsWhiteSpace(5)");
        self::assertFalse(condition: $parser->isWhiteSpace(c: 6), message: "testIsWhiteSpace(6)");
        self::assertFalse(condition: $parser->isWhiteSpace(c: 7), message: "testIsWhiteSpace(7)");
        self::assertTrue(condition: $parser->isWhiteSpace(c: 8), message: "testIsWhiteSpace(8)");
        self::assertTrue(condition: $parser->isWhiteSpace(c: 9), message: "testIsWhiteSpace(9)");
        self::assertTrue(condition: $parser->isWhiteSpace(c: 10), message: "testIsWhiteSpace(10)");
        self::assertTrue(condition: $parser->isWhiteSpace(c: 11), message: "testIsWhiteSpace(11)");
        self::assertTrue(condition: $parser->isWhiteSpace(c: 12), message: "testIsWhiteSpace(12)");
        self::assertTrue(condition: $parser->isWhiteSpace(c: 13), message: "testIsWhiteSpace(13)");
        self::assertFalse(condition: $parser->isWhiteSpace(c: 31), message: "testIsWhiteSpace(31)");
        self::assertTrue(condition: $parser->isWhiteSpace(c: 32), message: "testIsWhiteSpace(32)");
        self::assertFalse(condition: $parser->isWhiteSpace(c:33), message: "testIsWhiteSpace(33)");


        $string=" test \r\n me  \t end!";
        $byteArray=unpack("c*", $string);
        for($i=0; $i<size_of())
        echo '$byteArray[0] is: '.(int)$byteArray[0]."\r\n";
        echo '$byteArray[1] is: '.(int)$byteArray[1]."\r\n";
        echo '$byteArray[2] is: '.(int)$byteArray[2]."\r\n";
        echo '$byteArray[3] is: '.(int)$byteArray[3]."\r\n";
        echo '$byteArray[4] is: '.(int)$byteArray[4]."\r\n";
        echo '$byteArray[5] is: '.(int)$byteArray[5]."\r\n";
    //    self::assertTrue($byteArray[0]==32);




    }


}
