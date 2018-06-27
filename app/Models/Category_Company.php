<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category_Company extends Model
{
    protected $fillable = ['id', 'category_id', 'company_id'];
}
