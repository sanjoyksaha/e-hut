<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SubCategory extends Model
{
    protected $fillable =['name', 'slug', 'description', 'image', 'status'];

    public $timestamps = true;

    protected $with = ['childSubCategories'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function childSubCategories()
    {
        return $this->belongsToMany(ChildSubCategory::class)->withTimestamps();
    }

    protected function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    protected function setImageAttribute($value)
    {
        $attribute_name = "image";
        if(request()->hasFile($attribute_name) && request()->file($attribute_name)->isValid()) {
            $image_name = date('dmYhis').'.'.$value->getClientOriginalExtension();
            $value->storeAs('media/sub-category', $image_name, 'public');
            Image::make($value)->resize(200, 200)->save(public_path('storage/media/sub-category/'.$image_name));
            $this->attributes['image'] = $image_name;
        }
    }

    protected static function deleteImage($category)
    {
        if(file_exists('storage/media/sub-category/'.$category->image)) {
            Storage::delete('/public/media/sub-category/' . $category->image);
        }
    }
}
