<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }
}
