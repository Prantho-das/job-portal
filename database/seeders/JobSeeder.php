<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\EducationLevel;
use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = Company::all();
        $categories = Category::all();
        $educationLevels = EducationLevel::all();

        if ($companies->isEmpty() || $categories->isEmpty() || $educationLevels->isEmpty()) {
            $this->call([
                CompanySeeder::class,
                CategorySeeder::class,
                EducationLevelSeeder::class,
            ]);
            $companies = Company::all();
            $categories = Category::all();
            $educationLevels = EducationLevel::all();
        }

        $jobsData = [
            [
                'title' => 'Senior Laravel Developer',
                'description' => 'We are looking for a highly skilled Laravel developer to join our team.',
                'requirements' => '5+ years experience with Laravel, PHP, MySQL.',
                'responsibilities' => 'Develop and maintain web applications, collaborate with team members.',
                'benefits' => 'Competitive salary, health insurance, remote work options.',
                'salary_min' => 60000,
                'salary_max' => 90000,
                'location' => 'Remote',
                'job_type' => 'full-time',
                'employment_status' => 'permanent',
                'status' => 'active',
                'deadline' => now()->addMonths(1),
                'is_hot' => true,
                'keywords' => ['Laravel', 'PHP', 'Vue.js', 'MySQL'],
                'experience_min' => 5,
                'experience_max' => 10,
                'age_min' => 25,
                'age_max' => 45,
                'gender_preference' => 'prefer_not_to_say',
                'job_nature' => 'remote',
            ],
            [
                'title' => 'UI/UX Designer',
                'description' => 'Seeking a creative UI/UX designer to craft intuitive and beautiful user interfaces.',
                'requirements' => 'Proficiency in Figma, Sketch, Adobe XD. Strong portfolio.',
                'responsibilities' => 'Design user flows, wireframes, and high-fidelity prototypes.',
                'benefits' => 'Flexible hours, creative environment, professional development.',
                'salary_min' => 45000,
                'salary_max' => 70000,
                'location' => 'On-site',
                'job_type' => 'full-time',
                'employment_status' => 'permanent',
                'status' => 'active',
                'deadline' => now()->addWeeks(3),
                'is_hot' => false,
                'keywords' => ['UI', 'UX', 'Figma', 'Sketch'],
                'experience_min' => 3,
                'experience_max' => 7,
                'age_min' => 22,
                'age_max' => 40,
                'gender_preference' => 'prefer_not_to_say',
                'job_nature' => 'office',
            ],
            [
                'title' => 'Data Scientist',
                'description' => 'Join our data science team to analyze complex datasets and build predictive models.',
                'requirements' => 'Strong background in Python, R, SQL. Experience with machine learning frameworks.',
                'responsibilities' => 'Develop and implement data models, perform statistical analysis.',
                'benefits' => 'Research opportunities, competitive bonus, cutting-edge projects.',
                'salary_min' => 70000,
                'salary_max' => 110000,
                'location' => 'Hybrid',
                'job_type' => 'full-time',
                'employment_status' => 'permanent',
                'status' => 'active',
                'deadline' => now()->addMonths(2),
                'is_hot' => true,
                'keywords' => ['Data Science', 'Python', 'Machine Learning', 'SQL'],
                'experience_min' => 4,
                'experience_max' => 8,
                'age_min' => 28,
                'age_max' => 50,
                'gender_preference' => 'prefer_not_to_say',
                'job_nature' => 'hybrid',
            ],
        ];

        foreach ($jobsData as $jobData) {
            $company = $companies->random();
            $job = Job::create(array_merge($jobData, [
                'company_id' => $company->id,
                'slug' => Str::slug($jobData['title'] . '-' . Str::random(5)),
                'ref_no' => 'JOB-' . Str::upper(Str::random(6)),
            ]));

            // Attach random categories and education levels
            $job->categories()->attach($categories->shuffle()->take(rand(1, min(3, $categories->count())))->pluck('id'));
            $job->educationLevels()->attach($educationLevels->shuffle()->take(rand(1, min(2, $educationLevels->count())))->pluck('id'));
        }
    }
}
