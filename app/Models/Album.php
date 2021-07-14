<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array|\Illuminate\Support\MessageBag|null $check)
 */
class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title', 'description', 'product_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
