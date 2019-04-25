<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    public static function getComments($id){
        $comments = DB::table('comments')
        ->leftJoin('users', 'users.id', '=', 'comments.user_id')
        ->get();
        return $comments;
    }

    public static function canComment($bookid,$userid) {
        $comments = self::getComments($bookid);
        foreach ($comments as $comment){
            if($comment->user_id==$userid){
                return false;
            }
        }
        return true;
    }
}
