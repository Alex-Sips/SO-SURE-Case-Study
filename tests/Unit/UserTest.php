<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_user_table_has_the_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id',
                'username',
                'password',
                'user_level',
            ])
        );
    }
}
