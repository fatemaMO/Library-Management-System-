@extends('layouts.userNav')

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