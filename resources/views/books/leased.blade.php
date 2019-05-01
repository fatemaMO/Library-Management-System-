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
        @foreach ($userBooks as $userBook)
            @if($userBook->user_id == $userId)
                @foreach ($books as $book)
                    @if($book->id == $userBook->book_id)
                        <h1>Title:{{$book->title}}</h1>
                        <h1>Image:{{$book->image}}</h1>
                        <h1>Description:{{$book->description}}</h1>
                        <h1>Rate:{{$book->rate}}</h1>
                        <h1>Author:{{$book->auther}}</h1>
                        <h1>No.Of Days:{{$userBook->days}}</h1>
                        <br>
                    @endif 
                @endforeach
            @endif
        @endforeach
    </body>
</html>
