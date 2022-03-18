<?php
namespace Modules\Setting\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Setting\Entities\Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id = rand(1, 300);
        $image = 'https://picsum.photos/id/'.$id.'/700/600';
        $title = $this->faker->sentence($nbWords = 7, $variableNbWords = true);
        $subtitle = $this->faker->sentence($nbWords = 4, $variableNbWords = true);
        return [
            'title' => $title,
            'sub_title' => $subtitle,
            'logo' => $image,
            'favicon' => $image,
        ];
    }
}

