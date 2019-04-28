<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /* nourhan  */
    public function webBooks ()
    {
        $bookCategories = Category::all();
        $category  = Category::orderBy('created_at', 'asc')->first();
        $active = $category->id;
        $books = Book::orderBy('id', 'desc')->where('category_id',$active)->paginate(3);

        return view('books.webBooks', compact('bookCategories','books','active'));
    }

    public function categoryBooks ($id)
    {
        
        $active = $id;
        $books = Book::orderBy('id', 'desc')->where('category_id',$id)->paginate(3);
        $bookCategories = Category::all();
        return view('books.webBooks', compact('category','books','flag','bookCategories','active'));   
    }
}