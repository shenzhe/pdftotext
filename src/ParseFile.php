<?php

declare(strict_types=1);

namespace Shenzhe\Pdftotext;

class PraseFile
{
    private string $filename;
    private string $outputDir;
    public function __construct(string $filename, string $outputDir = '')
    {
        $this->filename = $filename;
        $this->outputDir = $outputDir;
    }
    

    public function parseFile(): string
    {
        $parser = ParserFactory::create($this->filename);
        $text = $parser->parse($this->filename);
        if(empty($text)) {
            throw new \Exception('conver text is empty');
        }
        return $text;
    }
}