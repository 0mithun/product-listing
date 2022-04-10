<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'about','meta_keyword',  'email','meta_description',
        'full_address','phone', 'facebook','twitter','instagram', 'pinterest', 'logo_image', 'favicon_image', 'og_image',  'header_css',
        'header_script', 'body_script', 'sidebar_color', 'nav_color', 'dark_mode',
        'default_layout', 'commingsoon_mode', 'search_engine_indexing', 'google_analytics', 'facebook_pixel', 'copyright_text', 'map_text'
    ];

    protected $casts = [
        'commingsoon_mode'  =>  'boolean',
        'search_engine_indexing'  =>  'boolean',
        'google_analytics'  =>  'boolean',
        'facebook_pixel'  =>  'boolean',
    ];



    /**
     * Get Website logo path
     *
     * @return void
     */
    public function getLogoImageUrlAttribute()
    {
        $site_url = rtrim(env('APP_URL'), '/');

        return Storage::disk('public')->exists($this->logo_image) ? $site_url.Storage::url($this->logo_image) : $site_url.'/backend/image/logo.png';
    }



    /**
     * Get Website favicon path
     *
     * @return void
     */
    public function getFaviconImageUrlAttribute()
    {
        $site_url = rtrim(env('APP_URL'), '/');

        return Storage::disk('public')->exists($this->favicon_image) ? $site_url.Storage::url($this->favicon_image) : $site_url.'/backend/image/logo.png';
    }


    /**
     * Get Open graph image path
     *
     * @return void
     */
    public function getOgImageUrlAttribute()
    {
        $site_url = rtrim(env('APP_URL'), '/');

        return Storage::disk('public')->exists($this->og_image) ? $site_url.Storage::url($this->og_image) : $site_url.'/backend/image/logo.png';
    }
}
