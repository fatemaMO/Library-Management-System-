<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = $request->validate([
            'comment' => 'required|min:20|max:255',
            'rating' => 'required',
        ]);
        // !this will be the actual userId
        $userid = Auth()->user()->id;
        $comment = $request->get('comment');
        $bookid = $request->get('bookid');
        $rating = $request->get('rating');
        DB::table('comments')->insert(
            ['dicription' => $comment, 'rate' => $rating, 'user_id' => $userid, 'book_id' => $bookid]
        );

        return redirect('/books/' . $bookid);
    }

    public function destroy($id)
    {
        //
        $comment = Comment::findOrFail($id);
        if ($comment->user_id==Auth()->user()->id){
            $comment->delete();
        }
        return  Redirect::back();
    }

}
