<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->name(),
            'password' => 'password',
        ];
    }

    public function normal()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_level' => 'user',
            ];
        });
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_level' => 'admin',
            ];
        });
    }

    public function superAdmin()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_level' => 'superadmin',
            ];
        });
    }
}
