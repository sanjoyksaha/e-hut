<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Currency extends Model
{
    protected $fillable = ['country_name', 'slug', 'currency_name', 'symbol', 'status'];

    public $timestamps = true;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setCountryNameAttribute($value)
    {
        $this->attributes['country_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
