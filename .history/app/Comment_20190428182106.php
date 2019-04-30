<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $fillable = ['user_id','dicription','rate','book_id'];

    public static function getComments($id)
    {
        $comments = DB::table('comments')
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->where('book_id','=',$id)
            ->get();
        return $comments;
    }

    public static function canComment($bookid, $userid)
    {

        $comments = self::getComments($bookid);
        foreach ($comments as $comment) {
            if ($comment->user_id == $userid && $comment->book_id == $bookid) {
                return false;
            }
        }
        return true;
    }

    public static function getAvgRate($bookId){
        $avgRate = DB::table('comments')->where('book_id',$bookId)->avg('rate');
        return round($avgRate);
    }
    public static function getNumberOfRates($bookId){
        $count = DB::table('comments')->where('book_id',$bookId)->count('rate');
        return $count;
    }
}
