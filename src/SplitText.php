<?php

declare(strict_types=1);

namespace Shenzhe\Pdftotext;

class SplitText
{
    private array $delimiters = ["\n\n", "\n", " "];

    private int $chunkSize = 1000;

    private int $maxChunkNum = 200;

    public function __construct(array $delimiters = [],  int $chunkSize = 500, int $maxChunkNum = 200)
    {
        if(!empty($splitTag)) {
            $this->delimiters = $delimiters;
        }
        $this->chunkSize = $chunkSize;
        $this->maxChunkNum = $maxChunkNum;
    }

    public function setDelimiters(array $delimiters): void
    {
        $this->delimiters = $delimiters;
    }

    public function splitByFile(string $filePath): array
    {
        $text = (new ParseFile($filePath))->parseFile();
        return $this->split($text);
    }

    public function split(string $text): array
    {
        $result = [$text];

        foreach ($this->delimiters as $delimiter) {
            $temp = [];
            foreach ($result as $str) {
                if (mb_strlen($str) > $this->chunkSize) {
                    $split = explode($delimiter, $str);
                    $temp = array_merge($temp, $split);
                } else {
                    $temp[] = $str;
                }
            }
            $result = $temp;
        }

        // return $result;

        // Combine smaller strings
        $combined = '';
        $finalResult = [];
        foreach ($result as $str) {
            $str = preg_replace('/\s+/', ' ', $str);
            $length = mb_strlen($str);
            if($length >= $this->chunkSize) {
                $finalResult[] = $str;
                continue;
            }
            if(mb_strlen($combined) + $length <= $this->chunkSize) {
                $combined .= PHP_EOL.$str;
            } else {
                $finalResult[] = trim($combined);
                $combined = $str;
            }
        }
        if($combined != '') {
            $finalResult[] = trim($combined);
        }

        return $finalResult;
    }
}