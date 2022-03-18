<?php
namespace Modules\Testimonial\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Testimonial\Entities\Testimonial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(30, 300);
        $image = 'https://picsum.photos/id/'.$id.'/700/600';
        $title = $this->faker->sentence($nbWords = 6, $variableNbWords = true);
        $position = $this->faker->sentence($nbWords = 8, $variableNbWords = true);

        return [
            'name' => $title,
            'position' => $position,
            'image' => $image,
            'description' => $this->faker->paragraph,
        ];
    }
}

