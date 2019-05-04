<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteViewController extends Controller
{
    public function index()
    {
        //$userid = 1;

        // get the book
        //$book = Book::find($id);
               
        echo "";
        return DB::table('favorites')->get();

        //return view('favorites.show');
    }
}