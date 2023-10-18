<?php
declare(strict_types=1);

namespace Shenzhe\Pdftotext\Adapter;
use Shenzhe\Pdftotext\ParserInterFace;

class HtmlParser implements ParserInterFace
{
    public function parse(string $filePath): string
    {
        $command = sprintf('pandoc -f %s -t plain %s -o %s', 'html', $filePath);
        echo $command.PHP_EOL;
        return @shell_exec($command);
    }
}