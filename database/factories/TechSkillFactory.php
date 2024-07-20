<?php

namespace Database\Factories;

use App\Models\TechSkill;
use Illuminate\Database\Eloquent\Factories\Factory;

class TechSkillFactory extends Factory
{
    public function definition(): array
    {
        return [
            TechSkill::NAME => fake()->word(),
        ];
    }
}
