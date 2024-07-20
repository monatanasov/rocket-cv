<?php

namespace Database\Factories;

use App\Models\University;
use Illuminate\Database\Eloquent\Factories\Factory;


class UniversityFactory extends Factory
{
    public function definition(): array
    {
        return [
            University::NAME => fake()->sentence(3),
            University::EVALUATION => fake()->randomFloat(2, 1, 10)
        ];
    }
}
