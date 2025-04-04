<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 1 user spesifik
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@mail.com',
            'password' => bcrypt('123'), // Tambahkan password
        ]);

        User::factory()->create([
            'name' => 'User Test',
            'email' => 'user@mail.com',
            'password' => bcrypt('123'), // Tambahkan password
        ]);
    }
}
