<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            // Tambah kolom baru
            $table->string('name')->after('id');
            $table->enum('gender', ['male', 'female', 'other'])->after('name');
            $table->string('avatar')->nullable()->after('gender');
            $table->string('email')->unique()->after('avatar');
            $table->string('password')->after('email');
            $table->text('address')->nullable()->after('password');
            $table->string('phone')->nullable()->after('address');
            $table->rememberToken()->after('phone');
        });

        // Hapus kolom lama (jika ada yang tidak dibutuhkan)
        Schema::table('admins', function (Blueprint $table) {
            // Contoh jika sebelumnya ada kolom user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn([
                'name', 'gender', 'avatar', 'email', 'password',
                'address', 'phone', 'remember_token'
            ]);
            // Tambahkan kembali kolom lama jika diperlukan
            $table->uuid('user_id')->nullable();
        });
    }
};
