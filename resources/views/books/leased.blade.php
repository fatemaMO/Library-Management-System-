@extends('layouts.userNav')

@section('content')
<div class="cover-img">
  <div class="bg-cover">
        @foreach ($userBooks as $userBook)
            @if($userBook->user_id == $userId)
                @foreach ($books as $book)
            <div class="card-deck">

                    @if($book->id == $userBook->book_id)
                        {{-- <h1>Title:{{$book->title}}</h1>
                        <h1>Image:{{$book->image}}</h1>
                       // <h1>Description:{{$book->description}}</h1>
                       // <h1>Rate:{{$book->rate}}</h1>
                       // <h1>Author:{{$book->auther}}</h1>
                        //<h1>No.Of Days:{{$userBook->days}}</h1>
                        <br> --}}
                        {{-- <div class="card-columns"> --}}

                        <div class="card" style="width:400px; background-color: #ffffffbd;">
                                <img class="card-img-top"  src="{{URL::to('/')}}/image/{{$book->image}}" alt="Card image cap" height="195" width="160">

                                <div class="card-body">
                                  <h3 class="card-title"><span class="card-tit-leased">Title: </span>{{$book->title}}</h3>
                                  <h4 class="card-title"><span class="card-tit-leased">Author: </span>{{$book->auther}}</h4>
                                  <h4 class="card-title"><span class="card-tit-leased">No.Of Days: </span>{{$userBook->days}}</h4>
                                  <h4 class="card-title"><span class="card-tit-leased">Rate: </span>{{$book->rate}}</h4>
                                  <h4 class="card-title"><span class="card-tit-leased">Description: </span>{{$book->description}}</h4>
                                </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @endif
        @endforeach
</div>
<div>
@endsection
