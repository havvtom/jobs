<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'user_id' => User::factory()->create(),
            'job_title' => $this->faker->name,
            'job_location' => $this->faker->unique()->safeEmail,
            'company_name' => $this->faker->name,
            'company_logo' => $this->faker->name,
            'job_link' => $this->faker->name,
        ];
    }
}
