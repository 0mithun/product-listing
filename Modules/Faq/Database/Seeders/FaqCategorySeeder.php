<?php

namespace Modules\Faq\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Faq\Entities\FaqCategory;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        FaqCategory::create([
            'name' => 'Mobile',
            'slug' => 'mobile',
        ]);
        FaqCategory::create([
            'name' => 'Computer',
            'slug' => 'computer',
        ]);
        FaqCategory::create([
            'name' => 'Car',
            'slug' => 'car',
        ]);
        FaqCategory::create([
            'name' => 'Food',
            'slug' => 'food',
        ]);
        FaqCategory::create([
            'name' => 'Clothes',
            'slug' => 'clothes',
        ]);
    }
}
