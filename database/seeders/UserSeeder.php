<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an Admin user
        User::create([
            'userId' => 'admin01',
            'name' => 'User',
            'email' => 'admin@test.com',
            'phone' => '01500000000',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create a Regular user
        User::create([
            'userId' => 'user01',
            'name' => 'User',
            'email' => 'user@test.com',
            'phone' => '01500000001',
            'password' => Hash::make('12345678'),
            'role' => 'user',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        User::factory()->count(10)->create();
    }
}
