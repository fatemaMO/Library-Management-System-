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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="content">
                    <div id="jquery-accordion-menu" class="jquery-accordion-menu">
                        <div class="jquery-accordion-menu-header active"> Categories </div>
                        <ul>
                        @forelse ($bookCategories as $bookCategory)
                        @if($active == $bookCategory->id)
                            <li class="captalize active" >
                        @else
                            <li class="captalize " >
                        @endif
                        <a href="<?php echo route('getBooks', ['id' => $bookCategory->id])?>"> {{$bookCategory->name}}</a></li>
                        @empty
                        <li> No Categories </li>
                        @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 content">
                <div class="row">
                @forelse ($books as $book)
                     <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                            <div class="card-body">
                                <p class="card-text captalize">
                                {{$book->title}}
                                </p>
                                <div class ="row">
                                    <div class="col-md-12">
                                        By: {{ $book->auther }}
                                    </div>
                                </div>
                                <p>
                                    {{$book->description}}
                                </p>
                               
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </div>
                                    <small class="text-muted"> No. of Copies :{{$book->available_copies_no}} </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                </div>
                <div class="row my-3 select_container">
                    <div class="col-md-3 reversible-text">
                    </div>
                    <div class="col-md-9">
                        <nav class="paginate margin-20 pl-10 pr-10 pt-2 ">
                        {{ $books->links() }}
                        </nav>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    
    </body>
</html>
