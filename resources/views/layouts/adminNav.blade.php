<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Liberary</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<nav class="navbar navbar-expand-sm bg-primary navbar-light">
        <img src="../../../public/img/new_library_logo.gif"  alt="Smiley face" height="55" width="60">
        <div class="text">
        <ul class="navbar-nav ">
            <li class="navbar-brand">
                <a class="nav-link" href="/admin/register" style="Color:#FFF">User</a>
            </li>
            <li class="navbar-brand">
                <a class="nav-link" href="/admin/mangers" style="Color:#FFF">Mangers</a>
            </li>
            <li class="navbar-brand">
                <a class="nav-link" href="/admin/books" style="Color:#FFF">Books</a>
            </li>
            <li class="navbar-brand">
                <a class="nav-link" href="/admin/categories" style="Color:#FFF">Catgories</a>
            </li>
            <li class="navbar-brand">
                <a class="nav-link" href="#" style="Color:#FFF">Display Profit</a>
            </li>
        </ul>
    </div>
    </nav>

  <div class="container">
  @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>