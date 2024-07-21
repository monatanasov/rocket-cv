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

    public function testStoreValidateFirstNameIsRequired()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        unset($cv[CV::FIRST_NAME]);

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::FIRST_NAME]);
    }

    public function testStoreValidateFirstNameIsString()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        $cv[CV::FIRST_NAME] = 1979;

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::FIRST_NAME]);
    }

    public function testStoreValidateFirstNameHasMinCharacters()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        $cv[CV::FIRST_NAME] = 'R';

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::FIRST_NAME]);
    }

    public function testStoreValidateFirstNameHasMaxCharacters()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        $cv[CV::FIRST_NAME] = str_repeat('R', 51);

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::FIRST_NAME]);
    }

    public function testStoreValidateFatherNameIsRequired()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        unset($cv[CV::FATHER_NAME]);

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::FATHER_NAME]);
    }

    public function testStoreValidateFatherNameIsString()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        $cv[CV::FATHER_NAME] = 1979;

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::FATHER_NAME]);
    }

    public function testStoreValidateFatherNameHasMinCharacters()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        $cv[CV::FATHER_NAME] = 'R';

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::FATHER_NAME]);
    }

    public function testStoreValidateFatherNameHasMaxCharacters()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        $cv[CV::FIRST_NAME] = str_repeat('R', 51);

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::FIRST_NAME]);
    }

    public function testStoreValidateSurnameIsRequired()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        unset($cv[CV::SURNAME]);

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::SURNAME]);
    }

    public function testStoreValidateSurnameIsString()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        $cv[CV::SURNAME] = 1979;

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::SURNAME]);
    }

    public function testStoreValidateSurnameHasMinCharacters()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        $cv[CV::SURNAME] = 'R';

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::SURNAME]);
    }

    public function testStoreValidateSurnameHasMaxCharacters()
    {
        $user = User::first();
        $cv = CV::factory()->raw();
        $cv[CV::SURNAME] = str_repeat('R', 51);

        $this
            ->actingAs($user)
            ->postJson($this->storeRoute(), $cv)
            ->assertUnprocessable()
            ->assertInvalid([CV::SURNAME]);
    }
}
