<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'url' => 'https://youtu.be/elq7Z0_UpW8',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/elq7Z0_UpW8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'platform_id' => 1
        ];
    }
}
