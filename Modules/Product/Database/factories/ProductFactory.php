<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Brand\Entities\Brand;
use Modules\Category\Entities\Category;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $id = rand(30, 600);
        $image = 'https://picsum.photos/id/' . $id . '/700/600';
        $title = $this->faker->sentence($nbWords = 2, $variableNbWords = true);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'sku' => rand(1999, 6999),
            'handling_time' => rand(1, 7),
            'shipping_cost' => rand(50, 100),
            'price' => rand(1000, 5000),
            'sale_price' => rand(0, 1000),
            'status' => rand(0, 1),
            'total_orders' => rand(0, 500),
            'total_favourites' => rand(0, 1000),
            'category_id' => Category::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
            'image' => $image,
            'short_description' => $this->faker->sentence(10),
            'long_description' => $this->faker->paragraph,
        ];
    }
}
