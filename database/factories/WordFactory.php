<?php

namespace Database\Factories;

use App\Models\Meaning;
use App\Models\Word;
use Illuminate\Database\Eloquent\Factories\Factory;

class WordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Word::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $meanings = Meaning::all('id')->pluck('id')->toArray();

        return [
            'spelling'   => $this->faker->unique()->word,
            'meaning_id' => $this->faker->randomElement($meanings)
        ];
    }
}
