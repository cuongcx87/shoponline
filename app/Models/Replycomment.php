<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Replycomment extends Model
{
    protected $fillable = ['content', 'name', 'created_at'];

    public function comments()
    {
    	return $this->belongsTo('App\Models\Comment', 'comment_id');
    }
}
