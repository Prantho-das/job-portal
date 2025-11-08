<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents; // Commented out to allow model events during seeding

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call other seeders
        $this->call([
            CategorySeeder::class,
            CompanySeeder::class,
            EducationLevelSeeder::class,
            SettingSeeder::class,
            JobSeeder::class,
            PageSeeder::class,
        ]);
    }
}