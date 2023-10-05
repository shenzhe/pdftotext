<?php
declare(strict_types=1);

namespace Shenzhe\Pdftotext\Adapter;
use Shenzhe\Pdftotext\ParserInterFace;

class PdfParser implements ParserInterFace
{
    public function parse(string $filePath): string
    {
        return shell_exec('pdftotext ' . $filePath . ' -');
    }
}