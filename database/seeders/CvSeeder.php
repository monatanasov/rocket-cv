<?php

namespace Database\Seeders;
use App\Models\CV;
use Illuminate\Database\Seeder;

class CvSeeder extends Seeder
{
    public function run(): void
    {
        CV::factory()->create();

        CV::factory()->create([
            CV::UNIVERSITY_ID => rand(min:1, max:5)
        ]);
    }
}
