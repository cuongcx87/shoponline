<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    public function customers()
    {
    	return $this->belongsTo('App\Models\Customer', 'customer_id');
    }
}
