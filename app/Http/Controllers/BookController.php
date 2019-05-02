<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Comment;
use App\Book;
use App\Like;
use Auth;
use App\UsersBook;

use Illuminate\Support\Facades\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

    //aml
    public function bookLikeBook(Request $request){
                var_dump("jhjhjhjh");
        $book_id = $request['bookId'];
        $is_like = $request['isLike'] === true ? true: false;
        $update = false;
        var_dump($book_id);
        var_dump($is_like);
        $book = Book::find($book_id);
        if(!$book){
            return null;
        }
        $user = Auth::user();
      //  var_dump($user);
        $like = $user->likes()->where('book_id', $book_id)->first();
       
        if($like){
          //  $already_like = $like->like;
           // $update = true;
           // if($already_like == $is_like){
                $like->delete();
           //     return null;
           // }
        } else{
           // $like = new Like();
            // $post =new Post(['name'=>'post1','body'=>'body1']);
            var_dump("hjhh");
            Like::create([
                'user_id' =>$user->id,
                'book_id'=>$book->id
            ]);
        }

      /*  $like->like = $is_like;
        $like->user_id = $user->id;
        $like->book_id = $book->id;
        if($update){
            $like->update();
        } else{
            $like->save();
        }*/
        return null;
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

    public function search(Request $request) {
        // debug("hhhh");
        $books = array();
        $flag = 0;
        $valueToSearch = $request->input('value');
        $valueToSearch = trim($valueToSearch);
        if ($valueToSearch != '') {
            $books = Book::where('title', 'like', "%$valueToSearch%")->orWhere('auther', 'like', "%$valueToSearch%")->get();
        }
        if (empty($books)) {
            $flag = 1;
        }
        $view = View::make('books.webSearch')->with('books', $books)->render();
        return response()->json(['flag' => $flag, 'view' => $view]);
    }

    public function getLeased(){
        $userId = 1;
        $userBooks = UsersBook::all();
        $books = Book::all();
        return view('books.leased', compact('userId','userBooks','books'));
    }

}
