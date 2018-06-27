<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
	
    public function admins()
    {
        return $this->belongsTo('App\Models\Admin');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
