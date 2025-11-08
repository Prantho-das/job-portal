<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Software Development', 'description' => 'Jobs related to software creation and maintenance.'],
            ['name' => 'Web Design', 'description' => 'Jobs focused on the visual and interactive aspects of websites.'],
            ['name' => 'Data Science', 'description' => 'Jobs involving data analysis, machine learning, and statistics.'],
            ['name' => 'Project Management', 'description' => 'Jobs overseeing projects and teams.'],
            ['name' => 'Human Resources', 'description' => 'Jobs related to HR functions and employee management.'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'parent_id' => null, // Top-level categories
            ]);
        }

        // Add a subcategory example
        $webDesign = Category::where('slug', 'web-design')->first();
        if ($webDesign) {
            Category::create([
                'name' => 'Frontend Development',
                'slug' => Str::slug('Frontend Development'),
                'description' => 'Specialized in client-side web development.',
                'parent_id' => $webDesign->id,
            ]);
        }
    }
}