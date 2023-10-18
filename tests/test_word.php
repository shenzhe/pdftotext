<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Shenzhe\Pdftotext\SplitText;

$filePath = __DIR__."/test.docx";

$split = new SplitText();
$resultArr = $split->splitByFile($filePath);
print_r($resultArr);