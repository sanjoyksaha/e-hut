<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'title' => 'User Management Access',
            'slug' => 'user-management-access'
        ]);
        Permission::create([
            'title' => 'User Access',
            'slug' => 'user-access'
        ]);
        Permission::create([
            'title' => 'User Create',
            'slug' => 'user-create'
        ]);
        Permission::create([
            'title' => 'User Edit',
            'slug' => 'user-edit'
        ]);
        Permission::create([
            'title' => 'User Delete',
            'slug' => 'user-delete'
        ]);
        Permission::create([
            'title' => 'Role Access',
            'slug' => 'role-access'
        ]);
        Permission::create([
            'title' => 'Role Create',
            'slug' => 'role-create'
        ]);
        Permission::create([
            'title' => 'Role Edit',
            'slug' => 'role-edit'
        ]);
        Permission::create([
            'title' => 'Role Delete',
            'slug' => 'role-delete'
        ]);
        Permission::create([
            'title' => 'Permission Access',
            'slug' => 'permission-access'
        ]);
        Permission::create([
            'title' => 'Permission Create',
            'slug' => 'permission-create'
        ]);
        Permission::create([
            'title' => 'Permission Edit',
            'slug' => 'permission-edit'
        ]);
        Permission::create([
            'title' => 'Permission Delete',
            'slug' => 'permission-delete'
        ]);
    }
}
