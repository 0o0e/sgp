<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nickname',
        'guardian_type',
        'age',
        'birthday',
        'gender',
        'height',
        'weight',
        'nationality',
        'real_eye_color',
        'real_hair_color',
        'real_hair_length',
        'real_distinguishing_features',
        'abilities',
        'backstory',
        'likes',
        'dislikes',
        'personality',
        'fake_name',
        'fake_nickname',
        'fake_age',
        'fake_birthday',
        'fake_nationality',
        'fake_eye_color',
        'fake_hair_color',
        'fake_hair_length',
        'fake_height',
        'fake_weight',
        'fake_distinguishing_features',
        'fake_abilities',
        'fake_backstory',
    ];

    protected $casts = [
        'birthday' => 'date',
        'fake_birthday' => 'date',
        'age' => 'integer',
        'fake_age' => 'integer',
        'height' => 'float',
        'fake_height' => 'float',
        'weight' => 'float',
        'fake_weight' => 'float',
    ];

    /**
     * Get the images for the guardian.
     */
    public function images(): HasMany
    {
        return $this->hasMany(GuardianImage::class);
    }

    /**
     * Get the children for the guardian.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Child::class);
    }

    /**
     * Get the real form image URL.
     */
    public function getRealFormImageUrlAttribute()
    {
        $image = $this->images()->where('image_type', 'real_form')->first();
        return $image ? asset('storage/' . $image->image_path) : null;
    }

    /**
     * Get the human form image URL.
     */
    public function getHumanFormImageUrlAttribute()
    {
        $image = $this->images()->where('image_type', 'human_form')->first();
        return $image ? asset('storage/' . $image->image_path) : null;
    }
}
