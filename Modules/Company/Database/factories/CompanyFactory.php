<?php

namespace Modules\Company\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Company\Entities\Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(30, 600);
        $image = 'https://picsum.photos/id/' . $id . '/700/600';
        $bio = $this->faker->sentence($nbWords = 20, $variableNbWords = true);

        return [
            'name' => $this->faker->name(2),
            'username' => $this->faker->name(1),
            'email' => $this->faker->email,
            'password' => bcrypt('password'),
            'organization_type' => Arr::random(['Private', 'Public', 'Government', 'NGO', 'Others', 'Agencies']),
            'established_at' => '2022-07-23',
            'website' => 'https://www.creativesoftware.com.bd/',
            'team_size' => '10-12',
            'industry_type' => 'It',
            'visibility' => '1',
            'logo' => $image,
            'banner' => $image,
            'country' => $this->faker->country(2),
            'city' => $this->faker->city(2),
            'address' => $this->faker->address,
            'map_Address' =>  $this->faker->address,
            'phone' =>  $this->faker->phoneNumber,
            'bio' =>  $bio,
        ];
    }
}
