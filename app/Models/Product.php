<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static count()
 */
class Product extends Model
{
    use HasFactory;

    /**
     * Product belongs to many Orders
     *
     * @return BelongsToMany
     */
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * Product belongs to SubCategory
     *
     * @return BelongsTo
     */
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * Product has many Albums
     *
     * @return HasMany
     */
    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}
