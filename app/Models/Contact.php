<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
        'email',
        'whatsapp',
        'map_embed',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'working_hours',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
