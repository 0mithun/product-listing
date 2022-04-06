<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create(['parent_id'=>null, 'name'=>'Root']);

        for($i = 0; $i<50; $i++){
            Category::factory()->create();
        }
    }
}
