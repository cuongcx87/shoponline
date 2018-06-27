<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	protected $fillable = ['name'];
    public function provinces()
    {
    	return $this->belongsTo('App\Models\Province');
    }

    public function wards()
    {
    	return $this->hasMany('App\Models\Ward');
    }
}
