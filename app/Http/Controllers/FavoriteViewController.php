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

        

        $user= Auth()->user();
        $favorites = $user->favorites;
        //dd($favorites);
        return view('favorites.show', compact('favorites'));
        //dd($favorites);

        //return view('favorites.show');
    }
}