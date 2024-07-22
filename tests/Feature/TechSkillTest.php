<?php

namespace Tests\Feature;

use App\Models\TechSkill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TechSkillTest extends TestCase
{
    private function storeRoute(): string
    {
        return route('tech-skills.store');
    }

    public function testStoreSkill(): void
    {
        $user = User::first();
        $skill = TechSkill::factory()->raw();
        $url = $this->storeRoute();

        $this
            ->actingAs($user)
            ->postJson($url, $skill)
            ->dump()
            ->assertCreated();
    }
}
