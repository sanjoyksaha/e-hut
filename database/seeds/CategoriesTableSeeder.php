<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create([
            'name' => "Men's Fashion",
            'slug' => "mens-fashion",
        ]);
        \App\Models\Category::create([
            'name' => "Women's Fashion",
            'slug' => "womens-fashion",
        ]);
        \App\Models\Category::create([
            'name' => "Kid's Fashion",
            'slug' => "kids-fashion",
        ]);
        \App\Models\Category::create([
            'name' => "Computers",
            'slug' => "computers",
        ]);
        \App\Models\Category::create([
            'name' => "Electronics",
            'slug' => "electronics",
        ]);
    }
}
