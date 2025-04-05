<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'image',
        
        // Basic information
        'nickname',
        'age',
        'birthday',
        'gender',
        'height',
        'weight',
        'nationality',
        
        // Real form (for guardians)
        'real_eye_color',
        'real_hair_color',
        'real_hair_length',
        'real_distinguishing_features',
        'real_abilities',
        'real_form_image',
        
        // Human form (for guardians)
        'human_fake_name',
        'human_fake_nickname',
        'human_fake_age',
        'human_fake_birthday',
        'human_fake_nationality',
        'human_appearance',
        'human_form_image',
        
        // Child information
        'paired_partner_id',
        'school',
        'family',
        
        // Personality
        'likes',
        'dislikes',
        'personality',
        
        // Backstory
        'backstory',
        
        // Images
        'before_image',
        'after_image'
    ];

    // Relationships
    public function pairedPartner()
    {
        return $this->belongsTo(Character::class, 'paired_partner_id');
    }

    public function children()
    {
        return $this->hasMany(Character::class, 'paired_partner_id');
    }
} 