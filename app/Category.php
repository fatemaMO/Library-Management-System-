<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = ['name', 'discription'];

    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
