<?php

namespace App\Breeze\core;

class PDFHeader
{
    private int $major;
    private int $minor;

    /**
     * @param int $major
     * @param int $minor
     */
    public function __construct(int $major, int $minor)
    {
        $this->major = $major;
        $this->minor = $minor;
    }


    public function getMajor(): int
    {
        return $this->major;
    }

    public function getMinor() : int
    {
        return $this->minor;
    }

    public function toString(): string
    {
        return "%PDF-{$this->major}.{$this->minor}";
    }
}