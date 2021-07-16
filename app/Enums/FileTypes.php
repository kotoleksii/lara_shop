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

    const PRODUCT_IMAGE_FILE_TYPE = [
        'dir' => 'products_images',
        'slug' => 'product-image-file-type',
    ];

    const PRODUCT_PDF_FILE_TYPE = [
        'dir' => 'products_pdf',
        'slug' => 'product-pdf-file-type',
    ];
}
