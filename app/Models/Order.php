<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table='orders';
	
    public function customers()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
