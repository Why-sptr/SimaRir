<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_works', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->decimal('salary', 15, 2);
            $table->text('description');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->foreignUuid('company_id')->nullable()->constrained('companies')->onDelete('cascade');
            $table->foreignUuid('work_type_id')->nullable()->constrained('work_types');
            $table->foreignUuid('work_method_id')->nullable()->constrained('work_methods');
            $table->foreignUuid('skill_job_id')->nullable()->constrained('skill_jobs');
            $table->foreignUuid('job_role_id')->nullable()->constrained('job_roles');
            $table->foreignUuid('qualification_id')->nullable()->constrained('qualifications');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_works');
    }
};
