<?php

namespace Modules\Job\Database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Modules\Company\Entities\Company;
use Illuminate\Support\Str;
use Modules\Category\Entities\Category;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Job\Entities\Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(30, 600);
        $image = 'https://picsum.photos/id/' . $id . '/700/600';

        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'company_id' => Company::inRandomOrder()->first()->id,
            'title' => $this->faker->name,
            'slug' => Str::slug($this->faker->name),
            'phone' =>  $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'website_link' => 'https://www.creativesoftware.com.bd/',
            'address' => $this->faker->address,
            'thumbnail' => $image,
            'gender' => 'Male',
            'expired_at' => '2022-07-23',
            'salary_range' => '10k to 100k',
            'map_Address' =>  $this->faker->address,
            'job_type' => Arr::random(['Full Time', 'Half Time']),
            'education' => $this->faker->name(2),
            'experience' => $this->faker->name(2),
            'short_description' => $this->faker->paragraph,
            'long_description' => $this->faker->paragraph,
        ];
    }
}
