<?php

namespace Database\Seeders;

use App\Models\EducationLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educationLevels = [
            ['name' => 'High School', 'description' => 'Secondary education completion.'],
            ['name' => 'Associate Degree', 'description' => 'Two-year post-secondary degree.'],
            ['name' => 'Bachelor\'s Degree', 'description' => 'Undergraduate university degree.'],
            ['name' => 'Master\'s Degree', 'description' => 'Postgraduate university degree.'],
            ['name' => 'Doctorate (Ph.D.)', 'description' => 'Highest academic degree.'],
        ];

        foreach ($educationLevels as $level) {
            EducationLevel::create([
                'name' => $level['name'],
                'slug' => Str::slug($level['name']),
                'description' => $level['description'],
                'status' => 'active',
            ]);
        }
    }
}