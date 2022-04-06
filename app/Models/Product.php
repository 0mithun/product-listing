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
        'category_id', 'title', 'slug', 'description', 'dimension', 'origin', 'price'
    ];

    public static function boot(){
        parent::boot();
        static::created(function($product){
            $product->update(['slug'=> Str::slug($product->name)]);

            $url = 'https://source.unsplash.com/random/300×300';
            $product
            ->addMediaFromUrl($url)
            ->toMediaCollection('gallery')
            // ->toMediaCollection('thumb')
            ;

            $url = 'https://source.unsplash.com/random/300×300';
            $product
            ->addMediaFromUrl($url)
            ->toMediaCollection('thumb')
            ;
        });
    }

            // in your model

        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('gallery')
                ->withResponsiveImages()
                ;
            $this->addMediaCollection('thumb')
                ->singleFile()
            ;
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



}
