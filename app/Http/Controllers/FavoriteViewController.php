<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteViewController extends Controller
{
    public function index()
    {
        //$userid = Auth()->user()->id;

        // get the book
        //$book = Book::find($id);
                
        return view('favorites.show');
    }
}