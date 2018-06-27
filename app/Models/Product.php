<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $dates = ['created_at'];
	
    public function companies()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    public function product_details()
    {
        return $this->hasOne('App\Models\ProductDetail');
    }
}
