<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'teszt',
            'email' => 'teszt@davidfabian.hu',
            'password' => Hash::make('Teszt1234'),
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'blog-admin@davidfabian.hu',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
        ]);
    }
}
