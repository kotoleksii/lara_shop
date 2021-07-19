<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\MessageBag;

/**
 * @method static create(array|MessageBag|null $check)
 */
class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title', 'description', 'product_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'product_id',
    ];

    /**
     * Album belongs to Product
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Album has many Images
     *
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
