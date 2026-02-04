<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'content',
        'image',
        'video_url',
        'experience_years',
        'happy_customers',
        'projects_completed',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
