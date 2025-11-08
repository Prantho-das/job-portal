<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there's at least one user to assign as an employer
        $employer = User::first();
        if (!$employer) {
            $employer = User::factory()->create([
                'name' => 'Employer User',
                'email' => 'employer@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        $companies = [
            [
                'name' => 'Tech Solutions Inc.',
                'description' => 'A leading technology company specializing in software development.',
                'industry' => 'Information Technology',
                'website' => 'https://techsolutions.com',
                'phone' => '123-456-7890',
                'email' => 'info@techsolutions.com',
                'address' => '123 Tech Street',
                'city' => 'New York',
                'country' => 'USA',
                'status' => 'active',
                'founded_at' => '2000-01-15',
            ],
            [
                'name' => 'Creative Designs Co.',
                'description' => 'An innovative design agency focusing on web and graphic design.',
                'industry' => 'Creative Services',
                'website' => 'https://creativedesigns.com',
                'phone' => '098-765-4321',
                'email' => 'contact@creativedesigns.com',
                'address' => '456 Art Avenue',
                'city' => 'Los Angeles',
                'country' => 'USA',
                'status' => 'active',
                'founded_at' => '2010-05-20',
            ],
            [
                'name' => 'Global Data Analytics',
                'description' => 'Providing cutting-edge data analysis and machine learning solutions.',
                'industry' => 'Data Science',
                'website' => 'https://globaldata.com',
                'phone' => '555-123-4567',
                'email' => 'hello@globaldata.com',
                'address' => '789 Data Drive',
                'city' => 'London',
                'country' => 'UK',
                'status' => 'active',
                'founded_at' => '2015-11-01',
            ],
        ];

        foreach ($companies as $companyData) {
            Company::create(array_merge($companyData, [
                'employer_id' => $employer->id,
                'slug' => Str::slug($companyData['name']),
            ]));
        }
    }
}