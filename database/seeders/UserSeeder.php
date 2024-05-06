<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin Aplikasi',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'level' => 1
                // 'remember_token' => Str::random(60)
            ]
        ];

        foreach ($user as $userData) {
            User::create($userData);
        }
    }
}
