<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $original_name
 * @property string $original_extension
 * @property string $path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @mixin Eloquent
 */
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'original_name', 'original_extension', 'path',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
