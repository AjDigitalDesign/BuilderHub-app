<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::firstOrCreate([
            'name' => 'role-menu'
        ]);

        Permission::firstOrCreate([
            'name' => 'users-menu'
        ]);

        Permission::firstOrCreate([
            'name' => 'permissions-menu'
        ]);

        Permission::firstOrCreate([
            'name' => 'create user'
        ]);

        Permission::firstOrCreate([
            'name' => 'read user'
        ]);

        Permission::firstOrCreate([
            'name' => 'update user'
        ]);

        Permission::firstOrCreate([
            'name' => 'delete user'
        ]);



        // Permission  for roles
        Permission::firstOrCreate([
            'name' => 'create role'
        ]);
        Permission::firstOrCreate([
            'name' => 'read role'
        ]);
        Permission::firstOrCreate([
            'name' => 'update role'
        ]);

        Permission::firstOrCreate([
            'name' => 'delete role'
        ]);


        // assign permission to roles

        $admin =  Role::where('name', 'admin')->first();
        $admin->givePermissionTo([
            'role-menu',
            'users-menu',
            'permissions-menu',
            'create user',
            'read user',
            'update user',
            'delete user',
            'create role',
            'read role',
            'update role',
            'delete role',
        ]);

        $agent = Role::where('name',  'agent')->first();
        $agent->givePermissionTo([
            'users-menu',
            'read user'
        ]);
    }
}
