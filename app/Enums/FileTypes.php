<?php


namespace App\Enums;


use ReflectionClass;

class FileTypes
{
    /**
     * Get constants
     * @return array
     */
    public static function getConstants(): array
    {
        $selfClass = new ReflectionClass(__CLASS__);
        return $selfClass->getConstants();
    }

    const IMAGE_FILE_TYPE = [
        'dir' => 'products_images',
    ];
}
