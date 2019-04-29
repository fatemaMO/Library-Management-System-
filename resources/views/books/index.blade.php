@extends('layouts.adminNav')

@section('content')
<div>
    <a class="btn btn-primary" style="margin: 19px;" href="{{ route('books.create')}}" class="btn btn-default">New books</a>
    </div>
<div class="top">
<div class="card" style="width: 18rem;">
@foreach($books as $book)
  {{-- <img class="card-img-top"  src="{{asset('imgage/'$book->image)}}" alt="Card image cap"> --}}
<img class="card-img-top"  src="{{URL::to('/')}}/image/{{$book->image}}" alt="Card image cap" height="195" width="160">
  <div class="card-body">
    <h2 class="card-title">Title:{{$book->title}}</h2>
    <h3 class="card-title">Auther:{{$book->auther}}</h3>
    <h4 class="card-title">Category:{{$book->category->name}}</h4>
    <p class="card-text">Description:{{$book->description}}</p>
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
