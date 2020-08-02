<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SubCategory::create([
            'name' => 'Clothing',
            'slug' => 'clothing',
        ]);
        \App\Models\SubCategory::create([
            'name' => 'Shows',
            'slug' => 'shows',
        ]);
        \App\Models\SubCategory::create([
            'name' => 'Watch',
            'slug' => 'watch',
        ]);
        \App\Models\SubCategory::create([
            'name' => 'Accessories',
            'slug' => 'accessories',
        ]);
        \App\Models\SubCategory::create([
            'name' => 'Data Storage',
            'slug' => 'data-storage',
        ]);
    }
}
