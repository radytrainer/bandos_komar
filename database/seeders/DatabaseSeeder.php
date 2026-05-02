<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Admin
        User::updateOrCreate(
            ['email' => 'admin@bandoskomar.org'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        // Staff
        User::updateOrCreate(
            ['email' => 'staff@bandoskomar.org'],
            [
                'name' => 'Staff Member',
                'password' => bcrypt('password'),
                'role' => 'staff',
            ]
        );

        // Normal User
        User::updateOrCreate(
            ['email' => 'user@bandoskomar.org'],
            [
                'name' => 'Normal User',
                'password' => bcrypt('password'),
                'role' => 'user',
            ]
        );
    }
}
