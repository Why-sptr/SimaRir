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
        Schema::table('skill_jobs', function (Blueprint $table) {
            $table->foreignUuid('job_id')->nullable()->after('skill_id')->constrained('job_works')->onDelete('cascade');
        });

        Schema::table('job_works', function (Blueprint $table) {
            $table->dropForeign(['skill_job_id']); 
            $table->dropColumn('skill_job_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('skill_jobs', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropColumn('job_id');
        });

        Schema::table('job_works', function (Blueprint $table) {
            $table->foreignUuid('skill_job_id')->nullable()->constrained('skill_jobs');
        });
    }
};
