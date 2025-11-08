<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'employer_id',
        'name',
        'slug',
        'logo',
        'description',
        'industry',
        'website',
        'phone',
        'email',
        'address',
        'city',
        'country',
        'status',
        'founded_at',
    ];

    protected $casts = [
        'founded_at' => 'date',
    ];

    // Relationships
    public function employer()
    {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}