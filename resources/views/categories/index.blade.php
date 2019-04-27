
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
    <img src="../../public/img/new_library_logo.gif"  alt="Smiley face" height="55" width="60">
        
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
                <a class="nav-link" href="/categories" style="Color:#FFF">Catgories</a>
            </li>
            <li class="navbar-brand">
                <a class="nav-link" href="#" style="Color:#FFF">Display Profit</a>
            </li>
        </ul>
    </div>
    </nav>
    </div>
    <div class="container">
    <div>
    <a class="btn btn-primary" style="margin: 19px;" href="{{ route('categories.create')}}" class="btn btn-default">New contact</a>
    </div>
    <div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Category Name</td>
          <td>category Discription</td>
         
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->discription}}</td>
          
            <td><a href="{{ route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('categories.destroy', $category->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
  

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
