<?php
namespace Modules\Portfolio\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Portfolio\Entities\Portfolio::class;

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
            'description' => $this->faker->paragraph,
        ];
    }
}

