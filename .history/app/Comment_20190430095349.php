<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $fillable = ['user_id','dicription','rate','book_id'];
    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
