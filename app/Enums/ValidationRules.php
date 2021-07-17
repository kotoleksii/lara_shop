<?php

namespace App\Enums;

/**
 * Class ValidationRules
 * @package App\Enums
 */
class ValidationRules
{
    /**
     * Get specific rules
     *
     * @param string $rule
     * @return string[]|null
     */
    public static function get(string $rule): ?array
    {
        return self::$rules[$rule];
    }

    /**
     * Rules array
     *
     * @var string[][]
     */
    private static $rules = [
        'category_create' => [
            'title'         => 'required|max:64',
        ],

        'category_patch' => [
            'title'         => 'sometimes|required|max:64',
        ],

        'album_create' => [
            'title'         => 'required|max:64',
            'description'   => 'sometimes|max:255',
            'product_id'    => 'required|numeric|exists:App\Models\Product,id',
        ],

        'images_multiple_upload' => [
            'upload'        => 'required',
            'upload.*'      => 'image|mimes:jpeg,jpg,png,gif,svg|max:10240',
        ],

        'order_create' => [
            'status'         => 'required|max:64',
            'total_sum'   => 'sometimes|max:255',
            'delivery_sum'   => 'sometimes|max:255',
            'user_id'    => 'required|numeric|exists:App\Models\User,id',
        ],

        'order_patch' => [
            'status'         => 'required|max:64',
            'total_sum'   => 'sometimes|max:255',
            'delivery_sum'   => 'sometimes|max:255',
            'user_id'    => 'required|numeric|exists:App\Models\User,id',
        ],
    ];

}
