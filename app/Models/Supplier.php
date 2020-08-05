<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Supplier extends Model
{
    protected $fillable = ['name', 'slug', 'email', 'website', 'phone_no', 'address', 'image', 'status'];

    public $timestamps = true;

    public function getRouteKeyName()
    {
        return 'slug';
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
            $value->storeAs('media/supplier', $image_name, 'public');
            Image::make($value)->resize(200, 200)->save(public_path('storage/media/supplier/'.$image_name));
            $this->attributes['image'] = $image_name;
        }
    }

    protected static function deleteImage($supplier)
    {
        if(Storage::get('/public/media/supplier/'.$supplier->image)) {
            Storage::delete('/public/media/supplier/' . $supplier->image);
        }
    }
}
