<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);
        $copiesAvailable = 2;
        $isAvailable = true;
        if ($copiesAvailable == 0) {
            $isAvailable = false;
        }
        $availabilityMessage = $copiesAvailable > 1 ? $copiesAvailable . " books are available" : "One book is available";
        return view('books.show', compact(['book', 'isAvailable', 'availabilityMessage']));
    }
}
