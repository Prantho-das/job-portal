<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('company_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['super_admin','company_admin', 'employer', 'seeker'])->default('seeker');
            $table->string('phone', 20)->nullable();
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['email', 'role', 'status']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};