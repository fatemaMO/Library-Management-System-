@extends('layouts.adminNav')

@section('content')
    <div>
    <a class="btn btn-primary" style="margin: 19px;" href="{{ route('categories.create')}}" class="btn btn-default">New contact</a>
    </div>
    <div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
        
          <td>Category Name</td>
          <td>category Discription</td>
         
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->name}}</td>
            <td>{{$category->discription}}</td>
          
            <td><a href="{{ route('categories.edit',$category->id)}}" class="btn btn-info"><i class="far fa-edit"></i>Edit</a></td>
            <td>
                <form action="{{ route('categories.destroy', $category->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
