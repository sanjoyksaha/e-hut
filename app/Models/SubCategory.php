<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable =['name', 'slug', 'description', 'image', 'status'];

    public $timestamps = true;

//    protected $with = ['Categories', 'childSubCategories'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function Categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function childSubCategories()
    {
        return $this->belongsToMany(ChildSubCategory::class);
    }
}
