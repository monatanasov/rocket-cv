<?php

namespace Database\Seeders;

use App\Enums\TechSkillEnum;
use App\Models\TechSkill;
use Illuminate\Database\Seeder;

class TechSkillSeeder extends Seeder
{
    public function run(): void
    {
        TechSkill::factory()->create([
            TechSkill::NAME => TechSkillEnum::PHP,
        ]);

        TechSkill::factory()->create([
            TechSkill::NAME => TechSkillEnum::LARAVEL,
        ]);

        TechSkill::factory()->create([
            TechSkill::NAME => TechSkillEnum::VUEJS,
        ]);

        TechSkill::factory()->create([
            TechSkill::NAME => TechSkillEnum::MYSQL,
        ]);

        TechSkill::factory()->create([
            TechSkill::NAME => TechSkillEnum::HTML5,
        ]);

        TechSkill::factory()->create([
            TechSkill::NAME => TechSkillEnum::CSS3,
        ]);
    }
}
