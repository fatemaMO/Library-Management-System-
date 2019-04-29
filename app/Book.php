<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    public static function getRelatedBooks($categoryId)
    {
        $relatedBooks = self::where('category_id', $categoryId)
            ->limit(6)
            ->get();
        return $relatedBooks;
    }

    //aml 
    public function user(){ 
        return $this->belongsTo('App\User');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
}
