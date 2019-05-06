<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Book;
use App\Comment;
use App\Like;
use Illuminate\Support\Facades\DB;
use App\UsersBook;

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
        $userid = Auth()->user()->id;
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
        $isFavourite = self::isFavourite($id);
        $canLease = self::canlease($id);
        $passedArgs = [
            'canLease', 'isFavourite', 'avgRate', 'relatedBooks', 'canComment',
            'comments', 'book', 'isAvailable', 'availabilityMessage', 'numberOfRates'
        ];
        return view('books.show', compact($passedArgs));
    }

    private function getComments($id)
    {
        $comments = DB::table('comments')
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->select('users.name', 'comments.user_id', 'comments.book_id', 'comments.dicription', 'comments.rate', 'comments.id')
            ->where('comments.book_id', '=', $id)
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

    private function getAvgRate($bookId)
    {

        // $avgRate = DB::table('comments')->where('book_id',$bookId)->avg('rate');
        $avgRate = Comment::where('book_id', $bookId)->avg('rate');
        return round($avgRate);
    }
    private function getNumberOfRates($bookId)
    {
        $count = Comment::where('book_id', $bookId)->count('rate');
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

    private function isFavourite($bookId)
    {
        $userId = Auth()->user()->id;
        $result = Like::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->get()
            ->count();
        if ($result == 0) {
            return false;
        }
        return true;
    }

    public function canLease($bookId)
    {
        $userId = Auth()->user()->id;
        $result = UsersBook::where('user_id', $userId)
            ->where('book_id', $bookId)
            ->get()
            ->count();
        if ($result == 0) {
            return true;
        }
        return false;
    }
}
