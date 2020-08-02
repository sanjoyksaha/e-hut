<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Role::create([
            'name' => 'Super Admin',
            'slug' => 'super-admin'
        ]);
        \App\Model\Role::create([
            'name' => 'Admin',
            'slug' => 'admin'
        ]);
        \App\Model\Role::create([
            'name' => 'Manager',
            'slug' => 'manager'
        ]);
        \App\Model\Role::create([
            'name' => 'Cashier',
            'slug' => 'cashier'
        ]);
        \App\Model\Role::create([
            'name' => 'User',
            'slug' => 'user'
        ]);
    }
}
