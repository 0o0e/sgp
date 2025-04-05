<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nickname',
        'age',
        'birthday',
        'gender',
        'height',
        'weight',
        'nationality',
        'eye_color',
        'hair_color',
        'hair_length',
        'distinguishing_features',
        'guardian_id',
        'appearance_before',
        'appearance_after',
        'family',
        'school',
        'abilities',
        'backstory',
        'likes',
        'dislikes',
        'personality',
    ];

    protected $casts = [
        'birthday' => 'date',
        'age' => 'integer',
        'height' => 'float',
        'weight' => 'float',
    ];

    /**
     * Get the guardian that owns the child.
     */
    public function guardian(): BelongsTo
    {
        return $this->belongsTo(Guardian::class);
    }

    /**
     * Get the before image for the child.
     */
    public function beforeImage(): HasOne
    {
        return $this->hasOne(ChildImage::class)->where('image_type', 'before');
    }

    /**
     * Get the after image for the child.
     */
    public function afterImage(): HasOne
    {
        return $this->hasOne(ChildImage::class)->where('image_type', 'after');
    }

    /**
     * Get the images for the child.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ChildImage::class);
    }

    /**
     * Get the before image URL.
     */
    public function getBeforeImageUrlAttribute()
    {
        $image = $this->images()->where('image_type', 'before')->first();
        return $image ? asset('storage/' . $image->image_path) : null;
    }

    /**
     * Get the after image URL.
     */
    public function getAfterImageUrlAttribute()
    {
        $image = $this->images()->where('image_type', 'after')->first();
        return $image ? asset('storage/' . $image->image_path) : null;
    }
}
