<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
//         $this->call(AdminsTableSeeder::class);
//         $this->call(RolesTableSeeder::class);
//         $this->call(PermissionsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        $this->call(ChildSubCategoriesTableSeeder::class);
    }
}
