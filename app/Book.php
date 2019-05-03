<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Like;
use App\UsersBook;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    use SoftDeletes;

    protected $attributes = [
        'rate' => 0,
    ];
    protected $fillable = ['title', 'description', 'image', 'auther', 'lease_fees', 'total_copies_no', 'available_copies_no', 'category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    //aml 
    public function user(){ 
        return $this->belongsTo('App\User');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function userBooks(){
        return $this->hasMany('App\UsersBook');
    }
}
