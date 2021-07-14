<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        return $this->hasOne(File::class);
    }
}
