<?php

namespace Tests\Unit;

use App\Models\CV;
use App\Models\TechSkill;
use Tests\TestCase;

class CvTest extends TestCase
{
    public function testBelongsToManySkills()
    {
        $newCV = CV::factory()->create();
        $firstSkill = TechSkill::factory()->create([
            TechSkill::NAME => 'Ajax',
        ]);
        $secondSkill = TechSkill::factory()->create([
            TechSkill::NAME => 'JQuery',
        ]);

        $newCV->techSkill()->attach($firstSkill);
        $this->assertTrue($newCV->techSkill->contains($firstSkill));
        $this->assertTrue($newCV->techSkill->doesntContain($secondSkill));
    }
}
