<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'yedi',
            'username' => 'yedi23',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('rahasia123'),
            'level' => 'admin',
        ]);

        User::create([
            'name' => 'fawaz',
            'username' => 'fawaz',
            'email' => 'fawaz@gmail.com',
            'password' => Hash::make('123456'),
            'level' => 'admin',
        ]);
    }
}
