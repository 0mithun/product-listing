<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'       =>  Category::where('id', '!=', 1)->inRandomOrder()->first()->id,
            'title'     =>  $this->faker->unique()->sentence,
            'description'       =>  $this->faker->paragraph(),
            'dimension' =>  $this->faker->name,
            'origin'        =>  $this->faker->country(),
            'price'     =>  $this->faker->numberBetween(100, 500),
            'metadata'  =>  $this->faker->paragraph(2)
        ];
    }
}
