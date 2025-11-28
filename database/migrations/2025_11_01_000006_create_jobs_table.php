<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('c_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->string('ref_no', 50)->unique()->nullable();
            $table->longText('description');
            $table->text('requirements')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('benefits')->nullable();
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->string('location', 100);
            $table->enum('job_type', ['full-time', 'part-time', 'remote', 'contract'])->default('full-time');
            $table->enum('employment_status', ['permanent', 'temporary', 'contractual'])->default('permanent');
            $table->enum('status', ['active', 'inactive', 'expired'])->default('active');
            $table->date('deadline')->nullable();
            $table->boolean('is_hot')->default(false);
            $table->json('keywords')->nullable();
            $table->integer('views_count')->default(0);
            $table->decimal('experience_min', 5, 2)->nullable()->default(0);
            $table->decimal('experience_max', 5, 2)->nullable()->default(5);
            $table->integer('age_min')->nullable()->default(18);
            $table->integer('age_max')->nullable()->default(35);
            $table->enum('gender_preference', ['male', 'female', 'both', 'prefer_not_to_say'])->nullable()->default('both');
            $table->enum('job_nature', ['office', 'field', 'remote', 'hybrid'])->nullable();
            $table->decimal('avg_match_score', 3, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
//            $table->index(['title', 'location', 'status', 'slug', 'salary_min', 'salary_max', 'experience_min', 'experience_max', 'age_min', 'age_max', 'gender_preference']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('c_jobs');
    }
};
