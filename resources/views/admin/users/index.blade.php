@extends('layouts.adminNav')

@section('content')
    <div class="container">
        @if(isset($users))
            <br><br>
            <div class=" row right">
                <a class="btn btn-success" href="{{route('users.create')}}" class="btn btn-default"><i class="fas fa-plus"></i> new user </a>
                </div>

        <br><br>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>name</td>
                        <td>email</td>
                       <td>username</td>
                        <td>phone</td>
                       <td>national_id</td>
                        <td>active</td>
                        <td colspan="4">action</td>
                       
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
                        <td>@if($user->is_active == true) active @else disactive @endif</td>
                        <td>
                            <a href="{{route('users.edit', ['id' => $user->id ])}}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                            @if($user->is_active == true)
                            <a href="{{route('users.active', ['id' => $user->id ])}}" class="btn btn-warning">disactivate</a>
                            @else
                            <a href="{{route('users.active', ['id' => $user->id ])}}" class="btn btn-success">activate</a>
                            @endif
                            <form action="{{route('users.destroy', ['id' => $user->id])}}"method="POST" style="display:inline" >
                            @csrf

                            {{ method_field('DELETE') }}
                            {{-- <input type="submit" value="delete" class="btn btn-dangre"> --}}
                            <button class="btn btn-danger" type="submit" value="delete" ><i class="fas fa-trash"></i>Delete</button>
                            </form>
                        </td>
                    
                    </tr>
                @empty
                    <p>No users</p>
                @endforelse


                </tbody>
            </table>
      
        </div>
        @else
        {{$msg}}
@endif
    </div>
@endsection
