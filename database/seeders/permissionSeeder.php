<?php

namespace Database\Seeders;

use App\Models\permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');




        $permissions = ['Assets.create', 'Assets.view', 'Assets.delete', 'Permissions.assign', 'Permissions.view', 'Permissions.remove', 'Assets.edit', 'Assets.record', 'Assets.rec_own', 'Attendances.create', 'Attendances.view', 'Attendances.delete', 'Attendances.edit', 'Departments.create', 'Departments.view', 'Departments.delete', 'Departments.edit', 'Documents.create', 'Documents.view', 'Documents.delete', 'Documents.edit', 'Leaves.create', 'Leaves.view', 'Leaves.delete', 'Leaves.edit', 'Roles.create', 'Roles.view', 'Roles.delete', 'Roles.edit',  'Users.create', 'Users.view', 'Users.delete', 'Users.edit'];

        foreach ($permissions as $permission) {
            # code...


            permission::firstOrCreate(["name" => $permission, "guard_name" => "web"]);
        }
    }
}
