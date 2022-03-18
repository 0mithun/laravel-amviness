<?php

namespace Modules\Coupon\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Coupon\Entities\Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => Str::random(10),
            'max_use' => 10,
            'discount' => rand(100, 1000),
            'expire_date' => now()->addDays(5),
            'type' => Arr::random(['Number', 'Percentage',]),
        ];
    }
}
