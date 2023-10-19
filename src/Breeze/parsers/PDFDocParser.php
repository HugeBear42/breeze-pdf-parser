<?php

namespace App\Breeze\parsers;

use App\Breeze\core\PDFHeader;
use App\tools\Logger;

class PDFDocParser
{

    public function parseHeader($fp): PDFHeader
    {
        rewind($fp);
        $string = fgets($fp);
        Logger::info($string) ;

        if (!str_starts_with(strtoupper($string), "%PDF-") || (strpos($string, ".") === false))
            throw new PDFParserException("Invalid PDF header, expecting %PDF, found {$string}");
        $filteredString=substr(strtoupper(trim($string)), 5);
        Logger::info("Filtered string: ".$filteredString) ;
        $result=explode(".", $filteredString);
        //echo sizeof($result);
        if (sizeof($result)!=2 || !is_numeric($result[0]) || !is_numeric($result[1]))
            throw new PDFParserException("Invalid PDF header, cannot parse version number: {$filteredString}");

        return new PDFHeader(major: (int)$result[0], minor: (int)$result[1]);
	}
}