<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='c_jobs';
    
    protected $fillable = [
        'company_id',
        'user_id',
        'title',
        'slug',
        'ref_no',
        'description',
        'requirements',
        'responsibilities',
        'benefits',
        'salary_min',
        'salary_max',
        'location',
        'job_type',
        'employment_status',
        'status',
        'deadline',
        'is_hot',
        'keywords',
        'experience_min',
        'experience_max',
        'age_min',
        'age_max',
        'gender_preference',
        'job_nature',
        'views_count',
        'avg_match_score',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_hot' => 'boolean',
        'keywords' => 'array',
    ];

    /** 🔗 Relationships */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'job_categories');
    }

    public function educationLevels()
    {
        return $this->belongsToMany(EducationLevel::class, 'job_education_levels');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}