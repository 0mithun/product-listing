<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'logo_image', 'favicon_image', 'header_css', 'header_script', 'body_script', 'sidebar_color', 'nav_color', 'dark_mode', 'default_layout'
    ];
}
