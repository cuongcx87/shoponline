<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';

    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function replycomment()
    {
        return $this->hasMany('App\Models\Replycomment')->orderBy('replycomments.created_at', 'desc');
    }
}
