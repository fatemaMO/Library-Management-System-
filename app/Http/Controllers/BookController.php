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
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //aml
    public function bookLikeBook(Request $request){
        $book_id = $request['bookId'];
        // $is_like = $request['isLike'] === true ? true: false;
        // $update = false;
        $book = Book::find($book_id);
        if(!$book){
            return null;
        }
        $user = Auth::user();
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
            Like::create([
                'user_id' =>$user->id,
                'book_id'=>$book_id,
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
    /* nourhan  */
    public function webBooks ()
    {
        $bookCategories = Category::all();
        $category  = Category::orderBy('created_at', 'asc')->first();
        $active = $category->id;
        $books = Book::orderBy('id', 'desc')->where('category_id',$active)->paginate(3);

        return view('books.webBooks', compact('bookCategories','books','active'));
    }

    public function orderBooks ($field)
    {
        $bookCategories = Category::all();
        $category  = Category::orderBy('created_at', 'asc')->first();
        $active = $category->id;
        $books = Book::orderBy("$field", 'desc')->where('category_id',$active)->paginate(3);

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
        $userId = Auth()->user()->id;
        $userBooks = UsersBook::all();
        $books = Book::all();
        return view('books.leased', compact('userId','userBooks','books'));
    }

    public function lease(Request $request){
        // $userId = Auth()->user()->id;
        $days = $request->days;
        $bookId = $request->bookId;
        $profit = Book::find($bookId)->lease_fees*$days;
        $leasedBook = new UsersBook;
        $leasedBook->book_id = $bookId;
        $leasedBook->days = $days;
        $leasedBook->profit = $profit;
        $leasedBook->user_id = Auth()->user()->id;
        $leasedBook->save();
        DB::table('books')->where('id','=', $bookId)->decrement('available_copies_no', 1);
        return redirect('/books/'. $bookId);
    }
}
