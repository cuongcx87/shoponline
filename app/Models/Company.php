<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'slug', 'description'];
	
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
