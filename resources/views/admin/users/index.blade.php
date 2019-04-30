@extends('layouts.adminNav')

@section('content')
    <div class="container">
        <div class = "row">
            <div class="col-md-12">
                <h1> Users </div>
            </div>
        </div>
        <div class = "row">
            <div class="col-md-12">
                <a href="{{route('users.create')}}" class="btn btn primary" > Add new user </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">username</th>
                        <th scope="col">phone</th>
                        <th scope="col">national_id</th>
                        <th scope="col">role_id</th>
                        <th scope="col">active</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->national_id}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>@if($user->is_active == true) active @else disactive @endif</td>
                        <td>
                            <a href="{{route('users.edit', ['id' => $user->id ])}}" class="btn btn-primary">update</a>
                            @if($user->is_active == true)
                            <a href="{{route('users.active', ['id' => $user->id ])}}" class=" btn btn-warning">disactivate</a> 
                            @else
                            <a href="{{route('users.active', ['id' => $user->id ])}}" class="  btn btn-success">activate</a>    
                            @endif
                            <form action="{{route('users.destroy', ['id' => $user->id])}}"method="POST" style="display:inline" >
                            @csrf

                            {{ method_field('DELETE') }}
                            <input type="submit" value="delete" class="btn btn-dangre">
                            </form>
                        </td>
                    </tr>
                @empty
                    <p>No users</p>
                @endforelse

                
                </tbody>
            </table>
        </div>

    </div>
@endsection
