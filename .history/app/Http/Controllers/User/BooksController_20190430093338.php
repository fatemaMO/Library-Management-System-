<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Book;
use App\Comment;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // !this will be the actual userId
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
        return view('books.show', compact(['avgRate', 'relatedBooks', 'canComment', 'comments', 'book', 'isAvailable', 'availabilityMessage', 'numberOfRates']));
    }

    private function getComments($id)
    {
        $comments = DB::table('comments')
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->where('book_id','=',$id)
            ->get();
        return $comments;
    }

    private function canComment($bookid, $userid)
    {

        $comments = self::getComments($bookid);
        foreach ($comments as $comment) {
            if ($comment->user_id == $userid && $comment->book_id == $bookid) {
                return false;
            }
        }
        return true;
    }

    private function getAvgRate($bookId){
        $avgRate = DB::table('comments')->where('book_id',$bookId)->avg('rate');
        return round($avgRate);
    }
    private function getNumberOfRates($bookId){
        $count = DB::table('comments')->where('book_id',$bookId)->count('rate');
        return $count;
    }
}