<?php

namespace Database\Seeders;

use Exception;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    const USERS = [
        [
            'username' => 'ben',
            'password' => 'benpass123',
            'user_level' => 'user',
        ],
        [
            'username' => 'ed',
            'password' => 'edpass123',
            'user_level' => 'superadmin',
        ],
        [
            'username' => 'matt',
            'password' => 'mattpass123',
            'user_level' => 'admin',
        ],
        [
            'username' => 'simon',
            'password' => 'simonpass123',
            'user_level' => 'user',
        ],
        [
            'username' => 'geoff',
            'password' => 'geoffpass123',
            'user_level' => 'admin',
        ],
    ];

    public function run()
    {
        if (app()->environment('production')) {
            throw new Exception("You can't run this seeder in production!");
        }

        foreach (self::USERS as $user) {
            User::factory()->create($user);
        }
    }
}
