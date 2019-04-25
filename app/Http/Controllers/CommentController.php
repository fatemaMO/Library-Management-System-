<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store (Request $request){
        $validator = $request->validate([
            'comment' => 'required|min:20|max:255',
            'rating' => 'required',
        ]);
            $userid = 1;
            $comment = $request->get('comment');
            $bookid = $request->get('bookid');
            $rating = $request->get('rating');
            DB::table('comments')->insert(
                ['dicription' => $comment, 'rate' => $rating , 'user_id'=>$userid,'book_id'=>$bookid]
            );
            
            return redirect('/books/'.$bookid);		}

}
