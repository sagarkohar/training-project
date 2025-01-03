<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB; // Import the DB facade


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $roles = ['Employee', 'Sales Executive', 'Floor Manager', 'Store Manager', 'HOD', 'IT Manager', 'Assistant Manager', 'Hr Manager', 'Amin', 'SuperAdmin'];



        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}
