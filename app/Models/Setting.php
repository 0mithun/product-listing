<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'logo_image', 'favicon_image', 'header_css', 'header_script', 'body_script', 'sidebar_color', 'nav_color', 'dark_mode', 'default_layout', 'commingsoon_mode'
    ];

    // protected $casts = [
    //     'commingsoon_mode'  =>  'boolean',
    //     'dark_mode'  =>  'boolean',
    // ];


    public function getLogoImageUrlAttribute()
    {
        $site_url = rtrim(env('APP_URL'), '/');

        return Storage::disk('public')->exists($this->logo_image) ? $site_url.Storage::url($this->logo_image) : $site_url.'/backend/image/logo-default.png';
    }


    public function getFaviconImageUrlAttribute()
    {
        $site_url = rtrim(env('APP_URL'), '/');

        return Storage::disk('public')->exists($this->favicon_image) ? $site_url.Storage::url($this->favicon_image) : $site_url.'/backend/image/logo-default.png';
    }
}
