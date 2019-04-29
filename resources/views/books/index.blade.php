@extends('layouts.adminNav')

@section('content')
<div>
    <a class="btn btn-primary" style="margin: 19px;" href="{{ route('books.create')}}" class="btn btn-default">New books</a>
    </div>
<div class="top">
<div class="card" style="width: 18rem;">
@foreach($books as $book)
  <img class="card-img-top" src="asset('')" alt="Card image cap">
  <div class="card-body">
    <h3 class="card-title">{{$book->title}}</h3>
    <h4 class="card-title">{{$book->auther}}</h4>
    <p class="card-text">{{$book->description}}</p>
    <a href="{{ route('books.edit',$book->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a></td>

                <form action="{{ route('books.destroy', $book->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>Delete</button>
                </form>
    @endforeach
    
  </div>
  </div>
</div>
@endsection