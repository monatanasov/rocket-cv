<?php

namespace Database\Seeders;

use App\Models\CV;
use App\Models\TechSkill;
use Illuminate\Database\Seeder;

class CvSkillSeeder extends Seeder
{
    public function run(): void
    {
        $firstCV = CV::first();
        $firstSkill = TechSkill::first();

        $firstCV->techSkill()->attach($firstSkill);
    }
}
