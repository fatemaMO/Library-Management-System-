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
        $canComment = self::canComment($id, $userid);
        // get the comments
        $comments = self::getComments($id);
        $relatedBooks = self::getRelatedBooks($book->category_id);
        $availabilityMessage = $copiesAvailable > 1 ? $copiesAvailable . " books are available" : "One book is available";
        $avgRate = self::getAvgRate($id);
        $numberOfRates = self::getNumberOfRates($id);
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

        // $avgRate = DB::table('comments')->where('book_id',$bookId)->avg('rate');
        $avgRate = Comment::where('book_id',$bookId)->avg('rate');
        return round($avgRate);
    }
    private function getNumberOfRates($bookId){
        $count = Comment::where('book_id',$bookId)->count('rate');
        // $count = DB::table('comments')->where('book_id',$bookId)->count('rate');
        return $count;
    }

    private function getRelatedBooks($categoryId)
    {
        $relatedBooks = Book::where('category_id', $categoryId)
            ->limit(6)
            ->get();
        return $relatedBooks;
    }
}