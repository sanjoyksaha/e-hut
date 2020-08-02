<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChildSubCategory extends Model
{
    protected $fillable =['name', 'slug', 'description', 'image'];

    public $timestamps = true;

    protected $with = ['subCategories'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subCategories()
    {
        return $this->belongsToMany(SubCategory::class);
    }
}
