<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Liberary</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<nav class="navbar navbar-expand-md bg-primary navbar-light">
        <img src="{{ asset('imgs/logo.gif') }}"  alt="Smiley face" height="55" width="60">

        <ul class="navbar-nav mr-auto ">
            <li class="navbar-brand">
                <a class="nav-link" href="/admin/users" style="Color:#FFF">User</a>
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        </div>

    </nav>

  <div class="container">
  @yield('content')
  </div>
</body>
</html>
