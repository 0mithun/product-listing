<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable  = [
        'category_id', 'title', 'slug', 'description', 'dimension', 'origin', 'price', 'metadata', 'home_page'
    ];

    protected $casts = [
        'home_page'     =>  'boolean'
    ];

    public static function boot(){
        parent::boot();
        static::created(function($product){
            $product->update(['slug'=> Str::slug($product->title)]);
        });
    }

            // in your model

        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('gallery')
                ->withResponsiveImages()
                ;
            // $this->addMediaCollection('thumb')
            //     // ->singleFile()
            // ;
        }


        /**
        * Register the conversions that should be performed.
        *
        * @return array
        */
        public function registerMediaConversions(Media $media = null): void
        {
            $this
                ->addMediaConversion('thumb')
                ->width(200)
                ->height(200)
                ;
        }

        public function category()
        {
            return $this->belongsTo(Category::class);
        }



}
