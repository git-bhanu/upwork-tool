<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key' => $this->faker->md5(),
            'title' => $this->faker->text(300),
            'description' => $this->faker->text(4000),
            'job_type' => $this->faker->randomElement(['fixed-price', 'hourly']),
            'job_url' => $this->faker->url(),
            'qualified' => $this->faker->boolean(100),
            'applied_date' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null),
            'upwork_created_date' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null),
            'created_at' => $this->faker->dateTimeBetween('-20 days', now())
        ];
    }
}
