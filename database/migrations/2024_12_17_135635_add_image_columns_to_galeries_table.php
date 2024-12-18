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
        Schema::table('galeries', function (Blueprint $table) {
            $table->dropColumn('image');

            // Menambahkan kolom sebelum 'updated_at' dengan cara berurutan
            $table->string('image6')->nullable()->after('company_id');
            $table->string('image5')->nullable()->after('company_id');
            $table->string('image4')->nullable()->after('company_id');
            $table->string('image3')->nullable()->after('company_id');
            $table->string('image2')->nullable()->after('company_id');
            $table->string('image1')->nullable()->after('company_id');
        });
    }


    public function down(): void
    {
        Schema::table('galeries', function (Blueprint $table) {
            // Kembalikan ke kondisi semula
            $table->string('image')->nullable();
            $table->dropColumn([
                'image1',
                'image2',
                'image3',
                'image4',
                'image5',
                'image6'
            ]);
        });
    }
};
