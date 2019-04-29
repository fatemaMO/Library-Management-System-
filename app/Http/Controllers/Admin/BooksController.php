<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Comment;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
     return view('books.index', compact('books'))->with('books', $books);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }
    // public function list(){
    //     $categories=Category::all();

    // }
    public function create()
    {
        //
        $categories=Category::all();

        return view('books.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'auther' => 'required',
            'lease_fees' => 'required',
            'total_copies_no' => 'required',
            'available_copies_no' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image =$request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();;
        $image->move(public_path('image'),$new_name);

        $form_data=array(
            'title' => $request->title,
            'description' => $request->description,
            'auther' => $request->auther,
            'lease_fees' => $request->lease_fees,
            'total_copies_no' => $request->total_copies_no,
            'available_copies_no' => $request->available_copies_no,
            'category_id' => $request->category_id,

           'image' =>  $new_name

        );
        $book = Book::create($form_data);

        return redirect('/admin/books')->with('success', 'Book is successfully saved');
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

    $book = Book::findOrFail($id);

    return view('books.edit', compact('book'));
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
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('admin/books')->with('success', 'Book is successfully deleted');
    }


}
