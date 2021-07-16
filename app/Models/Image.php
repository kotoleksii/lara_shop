<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property int $album_id
 * @property int $file_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Album $album
 * @property-read File|null $file
 * @mixin Eloquent
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title', 'description'
    ];

    protected $hidden = [
        'album_id', 'file_id', 'created_at', 'updated_at',
    ];

    /**
     * Image belongs to Album
     *
     * @return BelongsTo
     */
    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    /**
     * Image has File
     *
     * @return HasOne
     */
    public function file(): HasOne
    {
        return $this->hasOne(File::class, 'id', 'file_id');
    }
}
