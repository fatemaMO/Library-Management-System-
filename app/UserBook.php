<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBook extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }

    public function books(){
        return $this->belongsTo('App\Book');
    }
}
