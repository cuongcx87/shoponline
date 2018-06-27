<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public function orders()
    {
    	return $this->hasMany('App\Models\Order');
    }

    public function bills()
    {
    	return $this->hasMany('App\Models\Bill');
    }
}
