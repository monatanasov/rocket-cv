<?php

namespace Database\Factories;

use App\Models\CV;
use App\Models\University;
use Illuminate\Database\Eloquent\Factories\Factory;

class CvFactory extends Factory
{
    public function definition(): array
    {
        $firstUniversityId = University::first()->{University::ID};

        return [
            CV::FIRST_NAME => fake()->firstName(),
            CV::FATHER_NAME => fake()->lastName(),
            CV::SURNAME => fake()->lastName(),
            CV::BIRTH_DATE => fake()->date(),
            CV::UNIVERSITY_ID => $firstUniversityId
        ];
    }
}
