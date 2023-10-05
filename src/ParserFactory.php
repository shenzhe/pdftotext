<?php
declare(strict_types=1);

namespace Shenzhe\Pdftotext;

class ParserFactory
{
    private static $instance = [];
    public static function create(string $filePath): ParserInterFace
    {
        $ext = pathinfo($filePath, PATHINFO_EXTENSION);
        if(empty($ext)) {
            throw new \InvalidArgumentException('Invalid file path');   
        }
        $ext = strtolower($ext);
        if(isset(self::$instance[$ext])) {
            return self:: $instance[$ext];
        }
        $className = __NAMESPACE__ . "\\Adapter\\".ucfirst($ext)."Parser";;
        
        if(class_exists($className)) {
            self::$instance[$ext] = new $className();
            return self::$instance[$ext];
        }
        throw new \RuntimeException("no class {$className}");
    }
}