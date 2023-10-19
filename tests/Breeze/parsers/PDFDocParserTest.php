<?php

namespace App\Test\Breeze\parsers;

use App\Breeze\BreezeReader;
use App\Breeze\parsers\PDFDocParser;
use PHPUnit\Framework\TestCase;

class PDFDocParserTest extends TestCase
{

    public function testParseHeader()
    {
        $filepath=TESTS."/Samples/basic.pdf";
        $fp=fopen($filepath, "rb");

            $parser=new PDFDocParser();

        $myHeader=$parser->parseHeader($fp);
        //echo "Major: ".$myHeader->getMajor();
        //echo " Minor: ".$myHeader->getMinor();
        self::assertEquals(1, $myHeader->getMajor(), "Major");
        self::assertEquals(4, $myHeader->getMinor(), "Minor");
        self::assertEquals("%PDF-1.4", $myHeader->toString(), "toString()");
    }


}
