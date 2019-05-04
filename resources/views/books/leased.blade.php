@extends('layouts.userNav')

@section('content')
        @foreach ($userBooks as $userBook)
            @if($userBook->user_id == $userId)
                @foreach ($books as $book)
                    @if($book->id == $userBook->book_id)
                        <h1>Title:{{$book->title}}</h1>
                        <h1>Image:{{$book->image}}</h1>
                        <h1>Description:{{$book->description}}</h1>
                        <h1>Rate:{{$book->rate}}</h1>
                        <h1>Author:{{$book->auther}}</h1>
                        <h1>No.Of Days:{{$userBook->days}}</h1>
                        <br>
                    @endif 
                @endforeach
            @endif
        @endforeach
@endsection
