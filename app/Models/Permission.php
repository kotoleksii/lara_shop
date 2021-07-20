<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Permission
 *
 * @method static get()
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @mixin Eloquent
 */
class Permission extends Model
{
    use HasFactory;

    protected $fillable =[
        'title', 'slug'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
