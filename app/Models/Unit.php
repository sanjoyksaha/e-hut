<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Unit extends Model
{
    protected $fillable = ['name', 'slug'];

    public $timestamps = true;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
