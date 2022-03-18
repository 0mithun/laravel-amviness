<?php

namespace Modules\Priceplan\Database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceplanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Priceplan\Entities\Priceplan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'plan_type' => $this->faker->name,
            'lavel' => $this->faker->name,
            'price' => $this->faker->randomDigit,
            'discount_price' => $this->faker->randomDigit,
            'short_description' => $this->faker->paragraph,
            'long_description' => $this->faker->paragraph,
            'status' => rand(0,1),
        ];
    }
}
