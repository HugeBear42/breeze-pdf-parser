<?php

namespace App\Breeze\parsers;

class PDFParserException extends \Exception
{
    public function errorMessage()
    {


        return $this->getMessage();
    }

}