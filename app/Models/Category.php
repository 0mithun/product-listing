<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory, HasRecursiveRelationships;

    protected $fillable = [
        'name', 'slug', 'parent_id'
    ];


    public static function boot(){
        parent::boot();
        static::created(function($category){
            $category->update(['slug'=> Str::slug($category->name)]);
        });
    }


    public function getCustomPaths()
    {
        return [
            [
                'name' => 'name_path',
                'column' => 'name',
                'separator' => '/',
            ],
            [
                'name' => 'slug_path',
                'column' => 'slug',
                'separator' => '/',
            ],
        ];
    }

}
