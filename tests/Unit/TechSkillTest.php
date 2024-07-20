<?php

namespace Tests\Unit;

use App\Models\CV;
use App\Models\TechSkill;
use Tests\TestCase;

class TechSkillTest extends TestCase
{
    public function testBelongsToManyCvs(): void
    {
        $techSkill = TechSkill::factory()->create([
            TechSkill::NAME => 'Ajax',
        ]);
        $firstCV = CV::factory()->create();
        $secondCV = CV::factory()->create();

        $firstCV->techSkills()->attach($techSkill);

        $this->assertTrue($techSkill->cvs->contains($firstCV));
        $this->assertTrue($techSkill->cvs->doesntContain($secondCV));
    }
}
