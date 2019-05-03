<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $fillable = ['user_id','dicription','rate','book_id'];
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
