<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fanart extends Model
{
    use HasFactory;

    protected $fillable = [
        'character_id',
        'title',
        'description',
        'artist_name',
        'image_path',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }
} 