<?php

namespace Database\Factories;

use App\Models\Phrases;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhrasesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phrases::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'word' => $this->faker->lexify(),
        ];
    }
}
