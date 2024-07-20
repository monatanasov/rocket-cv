<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        University::factory()->create([
            University::NAME => 'University of Economics - Varna',
        ]);

        University::factory()->create([
            University::NAME => 'Technical University - Varna',
        ]);

        University::factory()->create([
            University::NAME => 'Medical University - Varna',
        ]);

        University::factory()->create([
            University::NAME => 'Sofia University "St. Kliment Ohridski"',
        ]);

        University::factory()->create([
            University::NAME => 'New Bulgarian University',
        ]);
    }
}
