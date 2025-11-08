<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('father_name', 100)->nullable();
            $table->string('mother_name', 100)->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('religion', 20)->nullable();
            $table->date('dob')->nullable();
            $table->string('nid', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('secondary_phone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('secondary_email', 100)->nullable();
            $table->text('present_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('objective', 255)->nullable();
            $table->decimal('present_salary', 10, 2)->nullable();
            $table->decimal('expected_salary', 10, 2)->nullable();
            $table->string('job_level', 20)->nullable();
            $table->string('job_nature', 20)->nullable();
            $table->text('career_summary')->nullable();
            $table->string('special_qualification', 255)->nullable();
            $table->string('keyword', 255)->nullable();
            $table->timestamps();
            $table->index(['user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};