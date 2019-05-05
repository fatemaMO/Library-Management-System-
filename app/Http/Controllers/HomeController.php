<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->type == 'manager' || Auth::user()->type == 'super_admin'){
            return view('admin');
        }
        else{
            return view('home');
        }
        
    }

    public function profile($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('home.edit',['user'=>$user]);

    }

    public function updateProfile(UserRequest $request, $id)
    {
       
        $user = User::find($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'phone' => $request['phone'],
            'national_id' => $request['national_id'],
       
        ]);
        if ($user) {
            return redirect('/webBooks')->with('success', 'user updated successfully');
        }

        return Redirect::back()->withInput();
    }

}
