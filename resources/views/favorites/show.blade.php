<!DOCTYPE html>

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>This is favorite page</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/favorite.css') }}" rel="stylesheet">


    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

</head>

<body>

    <h1>MY FAVORITES</h1>

    <div class="wrapper">
  

  <div class="table">
    
    <div class="row header blue">
      <div class="cell">Book Title</div>
      <div class="cell">Auther</div>
      <div class="cell">Image</div>
      <div class="cell">Description</div>
    </div>
    
    <div class="row">
      <div class="cell" data-title="Username">
      aml 
      </div>
      <div class="cell" data-title="Email">
        misterninja@hotmail.com
      </div>
      <div class="cell" data-title="Password">
        ************
      </div>
      <div class="cell" data-title="Active">
        Yes
      </div>
    </div>
    
    <div class="row">
      <div class="cell" data-title="Username">
        jsmith41
      </div>
      <div class="cell" data-title="Email">
        joseph.smith@gmail.com
      </div>
      <div class="cell" data-title="Password">
        ************
      </div>
      <div class="cell" data-title="Active">
        No
      </div>
    </div>
    
    <div class="row">
      <div class="cell" data-title="Username">
        1337hax0r15
      </div>
      <div class="cell" data-title="Email">
        hackerdude1000@aol.com
      </div>
      <div class="cell" data-title="Password">
        ************
      </div>
      <div class="cell" data-title="Active">
        Yes
      </div>
    </div>
    
    <div class="row">
      <div class="cell" data-title="Username">
        hairyharry19
      </div>
      <div class="cell" data-title="Email">
        harryharry@gmail.com
      </div>
      <div class="cell" data-title="Password">
        ************
      </div>
      <div class="cell" data-title="Active">
        Yes
      </div>
    </div>
    
  </div>
  
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>