<?php
namespace Modules\Team\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Team\Entities\Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(30, 300);
        $image = 'https://picsum.photos/id/'.$id.'/700/600';
        $title = $this->faker->sentence($nbWords = 8, $variableNbWords = true);

        return [
            'name' => $title,
            'image' => $image,
            'designation' => $this->faker->name,
        ];
    }
}
