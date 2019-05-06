@extends('layouts.adminNav')

@section('content')
<div class="top">
<div class="card uper">
  <div class="card-header">
  <h2>Edit Book</h2>
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
        @method('PATCH')
            @csrf
        <div class="form-group">
            <label for="name">Book Name:</label>
        <input type="text" class="form-control" name="title" value="{{$book->title}}"/>
        </div>
        <div class="form-group">
            <label for="name">Book Name:</label>
        <input type="text" class="form-control" name="auther" value="{{$book->auther}}"/>
        </div>


        <div class="form-group shadow-textarea">
             <label for="exampleFormControlTextarea4">Book description</label>
             <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" class="form-control" name="description" value="{{$book->description}}"></textarea>
       </div>

       <div class="form-group">
        <label for="lease_fees">lease_fees:</label>
        <input type="number"  step="0.01" class="form-control" name="lease_fees"  value="{{$book->lease_fees}}"/>
       </div>

       <div class="form-group">
        <label for="total_copies_no">number of total copy:</label>
        <input type="number"  class="form-control" name="total_copies_no" value="{{$book->total_copies_no}}"/>
      </div>

      <div class="form-group">
        <label for="available_copies_no">number of avaliable copy:</label>
      <input type="number" class="form-control" name="available_copies_no" value="{{$book->available_copies_no}}"/>
    </div>
    <br>
    <select class="browser-default custom-select" name="category_id" >
    <option value="">select category</option>
    @if(count($categories) > 0)
      @foreach($categories as $category)
        @if(isset($book->category) && $book->category->id == $category->id)
        <option value="{{$book->category->id}}" selected="">{{$book->category->name}}</option>
        @else
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endif
      @endforeach
    @endif
    </select>
<br><br>
    <div class="col-md-6">
        <input type="file" name="image" class="form-control">
        <img class="card-img-top"  src="{{URL::to('/')}}/image/{{$book->image}}" alt="Card image cap" height="200" width="100">
    <input type="hidden" name="hidden_image" value="{{$book->image}}"
    </div>
          <button type="submit" class="btn btn-success">Update Book</button>
          <div class="right">
            <button  class="btn btn-warning"> <a  href="/admin/books">Back</a></button>
        </div>
      </form>
  </div>
</div>
</div>

@endsection
