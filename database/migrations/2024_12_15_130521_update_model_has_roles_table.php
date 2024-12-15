<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateModelHasRolesTable extends Migration
{
    public function up()
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
            // Pastikan kolom model_id ada sebelum mencoba mengubahnya
            if (Schema::hasColumn('model_has_roles', 'model_id')) {
                $table->uuid('model_id')->change();
            }
        });
    }

    public function down()
    {
        Schema::table('model_has_roles', function (Blueprint $table) {
            // Revert kembali jika perlu
            $table->unsignedBigInteger('model_id')->change();
        });
    }
}

