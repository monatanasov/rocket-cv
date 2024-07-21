<?php

namespace Tests\Feature;

use App\Models\CV;
use App\Models\User;
use Tests\TestCase;

class CvTest extends TestCase
{
    private function storeRoute(): string
    {
        return route('dashboard.store');
    }

    public function testStoreUsersCanStoreCV(): void
    {
        $user = User::first();
        $cv = CV::factory()->raw();

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertCreated()
            ->assertSee($cv[CV::FIRST_NAME]);

        $this
            ->assertDatabaseHas(CV::TABLE, [
                CV::FIRST_NAME => $cv[CV::FIRST_NAME],
                CV::FATHER_NAME => $cv[CV::FATHER_NAME],
                CV::SURNAME => $cv[CV::SURNAME],
                CV::BIRTH_DATE => $cv[CV::BIRTH_DATE],
                CV::UNIVERSITY_ID => $cv[CV::UNIVERSITY_ID],
            ]);
    }
}
