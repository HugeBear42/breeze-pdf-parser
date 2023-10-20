<?php

namespace App\Breeze\parsers;

use App\Breeze\core\PDFHeader;
use App\tools\Logger;

class PDFParser
{


    const NUL = 0;    // null character
    const BS = 8;    // Backspace
    const TAB = 9;    // Horizontal Tab
    const LF = 10;    // Line Feed
    const VT = 11;    // Vertical Tab
    const FF = 12;    // Form Feed
    const CR = 13;    // Carriage Return
    const SP = 32;    // Space

    public function isWhiteSpace(int $c): bool
    {
        return (($c === self::SP) ||
            ($c === self::LF) ||
            ($c === self::CR) ||
            ($c === self::TAB) ||
            ($c === self::FF) ||
            ($c === self::NUL) ||
            ($c === self::BS) ||
            ($c === self::VT));
    }

      public function skipWhiteSpace($charArray) : array
      {
          while(sizeOf($charArray)>0 && $this->isWhiteSpace($charArray[0]))
          { array_shift($charArray);  }
          return $charArray;
      }
     /**
     * public function getToken($fp) : string
     * {
     * try
     * {
     * final ByteArrayOutputStream out=new ByteArrayOutputStream();
     * if(skipWhiteSpace(in)==-1)        // end of stream reached!
     * return null;
     * for(int c=0;(c=in.read())!=-1;)    // end of stream reached
     * {
     * if(isWhiteSpace((byte)c))    // found white space, don't bother "unreading" byte!
     * {    break;    }
     * else if(isDelimiter((byte)c))        // found a delimiter, if this is a new token(size!=0), break!
     * {
     * if(out.size()!=0)        // end of token, bail out without reading the delimiter!
     * {
     * in.unread();//in.unread(c);
     * break;
     * }
     * else                    // check if the delim is ">>" or "<<". If it is, read en extra byte!
     * {
     * if((byte)c!=Byte.SLASH && (byte)c!=Byte.PERCENT)    // beginning of a legal token, treat these as any other chars!
     * {
     * out.write(c);
     * if( (byte)c==Byte.LESS ||  (byte)c==Byte.GREATER)    // possibly dict begin or end!
     * {
     * //System.out.println("peek() in method getToken()");
     * if(in.peek()==c)
     * out.write(in.read());
     * //    int c1=in.read();
     * //    if(c==c1)
     * //        out.write(c1);    // indeed, a dictionary!
     * //    else
     * //        in.unread();//in.unread(c1);    // nothing significant found, push back!
     * }
     * break;
     * }
     * }
     * }
     * out.write(c);
     * }
     * return out.size()!=0 ? out.toByteArray() : null;
     * }
     * catch(IOException ioe)
     * {    throw new PDFParserException(ioe.getMessage());    }
     * }
     **/

}