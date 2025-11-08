<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => 'About Us',
                'slug' => Str::slug('About Us'),
                'content' => 'This is the content for the About Us page.',
                'status' => 'published',
            ],
            [
                'title' => 'Contact Us',
                'slug' => Str::slug('Contact Us'),
                'content' => 'This is the content for the Contact Us page. You can reach us at info@example.com.',
                'status' => 'published',
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => Str::slug('Privacy Policy'),
                'content' => 'This is a placeholder for the Privacy Policy. Your privacy is important to us.',
                'status' => 'published',
            ],
            [
                'title' => 'Terms of Service',
                'slug' => Str::slug('Terms of Service'),
                'content' => 'These are the terms and conditions for using our service.',
                'status' => 'published',
            ],
        ];

        foreach ($pages as $pageData) {
            Page::create($pageData);
        }
    }
}