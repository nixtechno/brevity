<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'info@brevityanderson.com'],
            [
                'name' => 'Site Admin',
                'password' => Hash::make('password123'),
                'is_admin' => true,
            ]
        );
    }
}

