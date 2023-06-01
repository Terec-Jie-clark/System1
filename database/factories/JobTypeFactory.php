<?php

namespace Database\Factories;

use App\Models\JobType;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $baseSalary = $this->faker->randomDigitNotNull * 100; // Mo Generates og random digit dayun multiply to 100
      $salary = $baseSalary * 1000; // add ang three zeros sa last
        return [
          'positionName' => $this->faker->jobTitle,
          'salary' => $salary,
        ];
    }
}
