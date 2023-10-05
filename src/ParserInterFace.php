<?php
declare(strict_types=1);

namespace Shenzhe\Pdftotext;

interface ParserInterFace
{
    public function parse(string $filePath): string;
}
