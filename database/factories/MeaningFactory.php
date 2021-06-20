<?php

namespace Database\Factories;

use App\Models\Meaning;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeaningFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meaning::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence
        ];
    }
}
