@extends('layouts.adminNav')

@section('content')
<div class="top">
    <div class="card uper">
  <div class="card-header">
   <h1 > Edit Book</h1>
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('categories.update', $category->id) }}">

      <div class="form-group purple-border">
              @csrf
              @method('PATCH')
              <label for="name">Category Name:</label>
              <input type="text" class="form-control" name="name" value="{{$category->name}}"/>
          </div>

          <div class="form-group shadow-textarea">
  <label for="exampleFormControlTextarea4">Category discription</label>
  <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" class="form-control" name="discription" value="{{$category->discription}}"></textarea>
</div>

          <button type="submit" class="btn btn-success">Update Book</button>
      </form>

  </div>

  </div>
  <div class="right">
      <button  class="btn btn-warning"> <a  href="/admin/categories">Back</a></button>
  </div>

  @endsection
