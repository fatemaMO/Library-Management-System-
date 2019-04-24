<?php

namespace App\Http\Controllers;

use App\Book;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);

        $copiesAvailable = 0;
        $isAvailable = true;
        $canComment = true;
        if ($copiesAvailable == 0) {
            $isAvailable = false;
        }
        $comments = [['name' => 'Motaz', 'dicription' => 'this is a very good book', 'rate' => 5],
            ['name' => 'Mohammed', 'dicription' => 'this is a very bad book', 'rate' => 1],
        ];
        $availabilityMessage = $copiesAvailable > 1 ? $copiesAvailable . " books are available" : "One book is available";
        return view('books.show', compact(['canComment', 'comments', 'book', 'isAvailable', 'availabilityMessage']));
    }

    public function index()
    {

    }
}
