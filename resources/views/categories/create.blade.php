
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <title>library</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
       <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
 <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark primary-color"> 
    <nav class="navbar navbar-expand-sm bg-primary navbar-light">
        <!-- <img src="../../"  alt="Smiley face" height="55" width="60"> -->
        <div class="text">
        <ul class="navbar-nav ">
            <li class="navbar-brand">
                <a class="nav-link" href="/users" style="Color:#FFF">User</a>
            </li>
            <li class="navbar-brand">
                <a class="nav-link" href="/mangers" style="Color:#FFF">Mangers</a>
            </li>
            <li class="navbar-brand">
                <a class="nav-link" href="/books" style="Color:#FFF">Books</a>
            </li>
            <li class="navbar-brand">
                <a class="nav-link" href="/catgories" style="Color:#FFF">Catgories</a>
            </li>
            <li class="navbar-brand">
                <a class="nav-link" href="#" style="Color:#FFF">Display Profit</a>
            </li>
        </ul>
    </div>
    </nav>
    </div>
    <div class="container">
<div class="card uper">
  <div class="card-header">
    Add Category
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
          <div class="form-group">
              <label for="price">Category Description :</label>
              <input type="text" class="form-control" name="discription"/>
          </div>
         
          <button type="submit" class="btn btn-primary-outline">Create Category</button>
      </form>
  </div>
</div>
</div>
  

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
