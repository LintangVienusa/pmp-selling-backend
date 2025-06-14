<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Tomi Iskandar',
            'email' => 'tomi@pmp.localhost',
            'password' => Hash::make('password123'),
            'role' => 'sales',
        ]);
    }
}
