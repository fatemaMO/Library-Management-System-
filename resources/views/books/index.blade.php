@extends('layouts.adminNav')

@section('content')
<div class="top">
<div class="right">
    <a class="btn btn-success"  href="{{ route('books.create')}}" class="btn btn-default"><i class="fas fa-plus"></i>New books</a>
    </div>
<br>


<table class="table table-hover">

  <thead class="thead-dark">

                  <tr>

                    <th>Title</th>
                     <th>Cover</th>
                    <th>Auther</th>

                    <th>Category</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>

                  </tr>

                </thead>

                <tbody>
        @foreach($books as $book)

  <tr>

        <th scope="row">{{$book->title}}</th>

        <td><img  src="{{URL::to('/')}}/image/{{$book->image}}" alt="Card image cap" height="100" width="100">
        </td>

        <td>{{$book->auther}}</td>
        <td>      @if(@isset($book->category))
                {{$book->category->name}}
         @endif</td>
         <td>{{$book->description}}</td>
         <td>    <a href="{{ route('books.edit',$book->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a></td>
        </td>
        <td>
                <form action="{{ route('books.destroy', $book->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>Delete</button>
                      </form>
        </td>

      </tr>

  @endforeach
  </div>

@endsection
