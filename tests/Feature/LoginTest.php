<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get(route('login'));

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_a_standard_user_can_login_and_gets_the_correct_view()
    {
        $user = User::factory()->normal()->create();

        $response = $this->post(route('login'), [
            'username' => $user->username,
            'password' => $user->password,
        ]);

        $response->assertSuccessful();
        $response->assertViewIs('auth.login-success.user');
    }

    public function test_a_admin_user_can_login_and_gets_the_correct_view()
    {
        $user = User::factory()->admin()->create();

        $response = $this->post(route('login'), [
            'username' => $user->username,
            'password' => $user->password,
        ]);

        $response->assertSuccessful();
        $response->assertViewIs('auth.login-success.admin');
    }

    public function test_a_superadmin_user_can_login_and_gets_the_correct_view()
    {
        $user = User::factory()->superAdmin()->create();

        $response = $this->post(route('login'), [
            'username' => $user->username,
            'password' => $user->password,
        ]);

        $response->assertSuccessful();
        $response->assertViewIs('auth.login-success.superadmin');
    }

    public function test_a_user_must_put_a_password()
    {
        $user = User::factory()->superAdmin()->create();

        $response = $this->post(route('login'), [
            'username' => $user->username,
        ]);

        $response->assertInvalid(['password']);
    }

    public function test_a_user_must_put_a_username()
    {
        $user = User::factory()->superAdmin()->create();

        $response = $this->post(route('login'), [
            'password' => $user->password,
        ]);

        $response->assertInvalid(['username']);
    }

    public function test_a_user_must_put_valid_details()
    {
        $user = User::factory()->superAdmin()->create();

        $response = $this->post(route('login'), [
            'username' => 'testing',
            'password' => $user->password,
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('error');
    }
}
