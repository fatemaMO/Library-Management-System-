@extends('layouts.adminNav')

@section('content')
<div class="top">
<div class="card uper">
  <div class="card-header ">
  <h1>Add Category</h1>  
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
      <form method="post" action="{{ route('categories.store') }}">
      
          <div class="form-group">
              @csrf
              <label for="name">Category Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group shadow-textarea">
  <label for="exampleFormControlTextarea4">Category discription</label>
  <textarea class="form-control" id="exampleFormControlTextarea4" rows="3" class="form-control" name="discription"></textarea>
</div>
         
          <button type="submit" class="btn btn-success">Create Category</button>
      </form>
  </div>
  
</div>
<div class="right">
      <button  class="btn btn-warning"> <a  href="/admin/categories">Back</a></button>
  </div>
</div>
@endsection
