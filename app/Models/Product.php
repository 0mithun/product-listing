<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable  = [
        'category_id', 'title', 'slug', 'description', 'dimension', 'origin', 'price'
    ];

    public static function boot(){
        parent::boot();
        static::created(function($category){
            $category->update(['slug'=> Str::slug($category->name)]);
        });
    }
}
