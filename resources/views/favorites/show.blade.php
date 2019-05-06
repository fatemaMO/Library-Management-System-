@extends('layouts.userNav')
@section('frameworks')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
<link href="{{ asset('css/favorite.css') }}" rel="stylesheet" />
<title>Favourites</title>
@endsection 

@section('content')

    <h1>MY FAVORITES</h1>

    <div class="wrapper">
  

  <div class="table" style="margin: 0 auto; width: 50%">
    
    <div class="row header blue">
      <div class="cell">Book Title</div>
      <div class="cell">Auther</div>
      <div class="cell">Image</div>
      <div class="cell">Description</div>
    </div>
    
    <div class="row">
    @foreach ($favorites as $favorite)
      <div class="cell" data-title="Username">
        {{ $favorite->title }}
      </div>
      <div class="cell" data-title="Email">
        {{ $favorite->description }}
      </div>
      <div class="cell" data-title="Password">
        {{ $favorite->auther }}
      </div>
      <div class="cell" data-title="Active">
        {{ $favorite->lease_fees }}
      </div>
    </div>
    
    @endforeach
  </div>
  
</div>
@endsection