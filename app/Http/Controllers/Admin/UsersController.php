<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Hash;
use Redirect;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
       return view('admin.users.create', ['roles'=> $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       $user = new User();
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'phone' => $request['phone'],
            'national_id' => $request['national_id'],
            'role_id' => $request['role_id'],
            'is_active' => true,
            'password' => Hash::make($request['password']),
        ]);
        if ($user) {
            return redirect('/admin/users')->with('success', 'user created successfully');
            
        }

        return Redirect::back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.edit',['user'=>$user, 'roles' => $roles]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
       
        $user = User::find($id)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'phone' => $request['phone'],
            'national_id' => $request['national_id'],
            'role_id' => $request['role_id'],
            'is_active' => true,
       
        ]);
        if ($user) {
            return redirect('/admin/users')->with('success', 'user updated successfully');
        }

        return Redirect::back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->delete()){
            return redirect('/admin/users')->with('success', 'user deleted successfully');
        }
        return Redirect::back()->withInput();

    }

    public function activate($id){
        $user = User::find($id);
        $user->is_active = !$user->is_active;
        if($user->save()){
            return redirect('/admin/users')->with('success', 'user updated successfully');
        }
        return Redirect::back()->withInput();
    }
}
