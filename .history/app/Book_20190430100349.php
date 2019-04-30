<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //

    protected $fillable = ['title', 'description', 'image','auther','lease_fees','total_copies_no','category_id'];
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    use SoftDeletes;
    public static function getRelatedBooks($categoryId)

    protected $attributes = [
        'rate' => 0,
     ];
    protected $fillable = ['title', 'description', 'image','auther','lease_fees','total_copies_no','available_copies_no','category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }}


