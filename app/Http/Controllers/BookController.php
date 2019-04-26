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
}
