<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Role
 *
 * @method static get()
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @mixin Eloquent
 */
class Role extends Model
{
    use HasFactory;

    const DEFAULT_ADMIN_ROLE_SLUG = 'admin';

    protected $fillable =[
        'title', 'slug'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Role belongs to many Permissions
     *
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
