@extends('layouts.adminNav')

@section('content')
<div class="top">
<div class="card uper">
  <div class="card-header">
    Edit Book
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
      <form method="post" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Book Name:</label>
              <input type="text" class="form-control" name="book_name" value="{{$book->book_name}}"/>
          </div>
          <div class="form-group">
              <label for="price">Book ISBN Number :</label>
              <input type="text" class="form-control" name="isbn_no" value="{{$book->isbn_no}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Book Price :</label>
              <input type="text" class="form-control" name="book_price" value="{{$book->book_price}}"/>
          </div>
          <button type="submit" class="btn btn-success">Update Book</button>
      </form>
  </div>
</div>
</div>
<div class="right">
      <button  class="btn btn-warning"> <a  href="/admin/books">Back</a></button>
  </div>
@endsection
