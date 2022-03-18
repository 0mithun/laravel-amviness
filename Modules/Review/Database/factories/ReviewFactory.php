<?php

namespace Modules\Review\Database\factories;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Modules\Course\Entities\Course;
use Modules\Product\Entities\Product;
use Modules\Student\Entities\Student;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Review\Entities\Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'stars' => Arr::random(['1', '2', '3', '4', '5']),
            'comment' => $this->faker->paragraph,
        ];
    }
}
