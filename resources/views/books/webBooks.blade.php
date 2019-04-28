<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="{{ asset('css/web.css') }}" rel="stylesheet">
    </head>
    
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
        <div class="content">
			<div id="jquery-accordion-menu" class="jquery-accordion-menu">
				<div class="jquery-accordion-menu-header active"> Categories </div>
				<ul>
                @forelse ($bookCategories as $bookCategory)
                <li class="captalize" ><a href="#"> {{$bookCategory->name}}</a></li>
                @empty
                <li> No Categories </li>
                @endforelse
				</ul>
			</div>
        </div>
        </div>
    </div>
</div>
    
    </body>
</html>
