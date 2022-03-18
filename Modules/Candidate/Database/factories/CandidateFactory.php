<?php

namespace Modules\Candidate\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CandidateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Candidate\Entities\Candidate::class;

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
            'profession' => $this->faker->name(1),
            'experience' => $this->faker->name(1),
            'education' => $this->faker->name(1),
            'website' => 'https://www.creativesoftware.com.bd/',
            'visibility' => '1',
            'avatar' => $image,
            'file' => $image,
            'country' => $this->faker->country(2),
            'city' => $this->faker->city(2),
            'address' => $this->faker->address,
            'map_Address' =>  $this->faker->address,
            'phone' =>  $this->faker->phoneNumber,
            'bio' =>  $bio,
        ];
    }
}
