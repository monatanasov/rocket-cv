<?php

namespace Tests\Unit;

use App\Models\CV;
use App\Models\TechSkill;
use App\Models\University;
use Tests\TestCase;

class CvTest extends TestCase
{
    public function testBelongsToManyTechSkills()
    {
        $cv = CV::factory()->create();
        $firstSkill = TechSkill::factory()->create([
            TechSkill::NAME => 'Ajax',
        ]);
        $secondSkill = TechSkill::factory()->create([
            TechSkill::NAME => 'JQuery',
        ]);

        $cv->techSkills()->attach($firstSkill);
        $this->assertTrue($cv->techSkills->contains($firstSkill));
        $this->assertTrue($cv->techSkills->doesntContain($secondSkill));
    }

    public function testBelongsToUniversity()
    {
        $university = University::factory()->create([
           University::NAME => 'Sofia University',
        ]);
        $cv = CV::factory()->create([
            CV::UNIVERSITY_ID => $university->{University::ID}
        ]);

        $this->assertInstanceOf(University::class, $cv->university);
        $this->assertTrue($cv->university()->is($university));
    }
}
