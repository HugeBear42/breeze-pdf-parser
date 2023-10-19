<?php

namespace App\Test\Breeze;

use App\Breeze\BreezeReader;
use PHPUnit\Framework\TestCase;

class BreezeReaderTest extends TestCase
{

 /**   public function testReturnTrue()
    {
        $breezeReader = new BreezeReader();
        $result = $breezeReader->returnTrue();

        $this->assertEquals(true, $result);
    }
**/
    public function testMultiply()
    {
        $breezeReader = new BreezeReader();
        $result = $breezeReader->multiply(2, 5);

        $this->assertEquals(10, $result);



        $result = $breezeReader->multiply(0, -1);
        $this->assertEquals(0, $result);
    }

    public function testPDFExists()
    {
        $filepath="/Samples/basic.pdf";
        $this->assertTrue(file_exists(TESTS.$filepath), "File {$filepath} exists");
    }
}
