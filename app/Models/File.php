<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'original_name', 'original_extention', 'path',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
