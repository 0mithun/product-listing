<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socialite extends Model
{
    use HasFactory;

    protected $fillable = [
        'google', 'twitter', 'linkedin', 'facebook'
    ];

    protected $casts = [
        'google'        =>  'boolean',
        'twitter'        =>  'boolean',
        'linkedin'        =>  'boolean',
        'facebook'        =>  'boolean',
    ];
}
