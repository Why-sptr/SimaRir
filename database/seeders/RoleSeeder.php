<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Membuat role
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'company']);
        Role::create(['name' => 'user']);
    }
}
