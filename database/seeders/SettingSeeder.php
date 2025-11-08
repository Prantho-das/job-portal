<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'BGEA Jobs Portal', 'type' => 'text', 'description' => 'The name of the job portal website.'],
            ['key' => 'contact_email', 'value' => 'contact@bgeajobs.com', 'type' => 'email', 'description' => 'Contact email for the job portal.'],
            ['key' => 'address', 'value' => '123 Job Street, City, Country', 'type' => 'textarea', 'description' => 'Physical address of the job portal.'],
            ['key' => 'phone_number', 'value' => '+1234567890', 'type' => 'text', 'description' => 'Contact phone number.'],
            ['key' => 'facebook_url', 'value' => 'https://facebook.com/bgeajobs', 'type' => 'url', 'description' => 'Facebook page URL.'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com/bgeajobs', 'type' => 'url', 'description' => 'Twitter page URL.'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/company/bgeajobs', 'type' => 'url', 'description' => 'LinkedIn page URL.'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}