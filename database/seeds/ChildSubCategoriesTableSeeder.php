<?php

use Illuminate\Database\Seeder;

class ChildSubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ChildSubCategory::create([
            'name' => 'Shirt',
            'slug' => 'shirt',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'T-Shirt',
            'slug' => 't-shirt',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'Jeans Pant',
            'slug' => 'jeans-pant',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'Shorts',
            'slug' => 'shorts',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'Three Quarter',
            'slug' => 'three-quarter',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'Shocks',
            'slug' => 'shocks',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'Three Piece',
            'slug' => 'three-piece',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'One Piece',
            'slug' => 'one-piece',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'External Hard Drive',
            'slug' => 'external-hard-drive',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'External Solid State Drive',
            'slug' => 'external-solid-state-drive',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'Internal Hard Drive',
            'slug' => 'internal-hard-drive',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'Internal Solid State Drive',
            'slug' => 'internal-solid-state-drive',
        ]);
        \App\Models\ChildSubCategory::create([
            'name' => 'USB Flash Drive',
            'slug' => 'usb-flash-drive',
        ]);
    }
}
