<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Book extends Model
{
    //
    public static function getRelatedBooks($categoryId)
    {
        $relatedBooks = self::where('category_id', $categoryId)
            ->limit(6)
            ->get();
        return $relatedBooks;
    }
    protected $fillable = ['title', 'description', 'image','auther','lease_fees','total_copies_no','category_id'];
}


