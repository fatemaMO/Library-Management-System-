<?php

namespace App\Http\Controllers;

use App\Book;
use App\Comment;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function show($id)
    {
        $userid = 1;
        // get the book
        $book = Book::find($id);
        // get available copies
        $copiesAvailable = $book->available_copies_no;
        $isAvailable = true;
        if ($copiesAvailable == 0) {
            $isAvailable = false;
        }
        // check if he can rate and comment
        $canComment = Comment::canComment($id, $userid);
        // get the comments
        $comments = Comment::getComments($id);
        $relatedBooks = Book::getRelatedBooks($book->category_id);
        $availabilityMessage = $copiesAvailable > 1 ? $copiesAvailable . " books are available" : "One book is available";
        $avgRate = Comment::getAvgRate($id);
        $numberOfRates = Comment::getNumberOfRates($id);
        return view('books.show', compact(['avgRate', 'oldComment', 'relatedBooks', 'canComment', 'comments', 'book', 'isAvailable', 'availabilityMessage' , 'numberOfRates']));
    }

    public function index()
    { }

    //aml
    public function bookLikeBook(Request $request){
        $book_id = $request['bookId'];
        $is_like = $request['isLike'] === true ;
        $update = false;
        $book = Book::find($book_id);
        if(!$book){
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('book_id', $book_id)->first();
        if($like){
            $already_like = $like->like;
            $update = true;
            if($already_like == $is_like){
                $like->delete();
                return null;
            }
        } else{
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->book_id = $book->id;
        if($update){
            $like->update();
        } else{
            $like->save();
        }
        return null;
    }
}
