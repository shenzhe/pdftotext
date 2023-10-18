<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Shenzhe\Pdftotext\SplitText;

$pdfFilePath = "https://ireus.nus.edu.sg/wp-content/uploads/2019/05/%E6%96%B0%E5%8A%A0%E5%9D%A1%E6%88%BF%E5%9C%B0%E4%BA%A7%E5%B8%82%E5%9C%BA%E7%9A%84%E5%8F%98%E9%9D%A9%E4%B8%8E%E5%88%9B%E6%96%B0-%E5%9B%BE%E4%B9%A6%E8%B5%84%E6%96%99.pdf";

$split = new SplitText();
$resultArr = $split->splitByFile($pdfFilePath);
print_r($resultArr);