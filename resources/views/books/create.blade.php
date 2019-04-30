@extends('layouts.adminNav')

@section('content')



<div class="card top">
  <div class="card-header">
   <h1> Add Book</h1>
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

      <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
          <div class="form-group">
              @csrf
              <label for="name">Book Name:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="auther">Auther :</label>
              <input type="text" class="form-control" name="auther"/>
          </div>
          <div class="form-group shadow-textarea">
               <label for="exampleFormControlTextarea4">Book description</label>
               <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" class="form-control" name="description"></textarea>
         </div>
         <div class="form-group">
              <label for="lease_fees">lease_fees:</label>
              <input type="number"  step="0.01" class="form-control" name="lease_fees"/>
          </div>
          <div class="form-group">
              <label for="total_copies_no">number of total copy:</label>
              <input type="number" class="form-control" name="total_copies_no"/>
          </div>

          <div class="form-group">
              <label for="available_copies_no">number of available copy:</label>
              <input type="number" class="form-control" name="available_copies_no"/>
          </div>
          <select class="browser-default custom-select" name="category_id">
            <option selected>Category</option>
            @foreach($categories as $category)

                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
<br><br>

        <div class="col-md-6">
               <label for="exampleFormControlFile1">Choose image</label>
            <input type="file" name="image" class="form-control">

        </div>

        <br><br>

          <button type="submit" class="btn btn-success">Create Book</button>
          <div class="right">
                <button  class="btn btn-warning"> <a  href="/admin/books">Back</a></button>
            </div>
      </form>
    </div>



@endsection
