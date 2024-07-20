<?php

namespace Tests\Unit;

use App\Models\CV;
use App\Models\University;
use Tests\TestCase;

class UniversityTest extends TestCase
{

    public function testHasManyCvs(): void
    {
        $university = University::factory()->create([
            University::NAME => 'Rocket University',
        ]);
        $firstCV = CV::factory()->create([
            CV::UNIVERSITY_ID => $university->{University::ID}
        ]);
        $secondCV = CV::factory()->create();

        $this->assertTrue($university->cvs->contains($firstCV));
        $this->assertTrue($university->cvs->doesntContain($secondCV));
    }
}
