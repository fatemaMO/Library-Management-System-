<!DOCTYPE html>

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>This is book page</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/book.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('../../js/app.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="row book">
            <div class="col-3">
                <img src="{{ asset('imgs/cover.jpg') }}" class="bookCover img-fluid">
            </div>
            <div class="col-7 bookArea">
                <div class="row">
                    <div class="col-9">

                        <h3 class="bookTitle">{{ $book->title }}</h3>
                        @if ($numberOfRates > 0)
                        <h4>Average rating : </h4>
                        @for ($i=0;$i<$avgRate;$i++) <span class="star yellow-text text-darken-2">★</span>
                            @endfor
                            @for ($i=0;$i<(5-$avgRate);$i++) <span class="star">☆</span>
                                @endfor
                                @if ($numberOfRates > 1)
                                <span> ({{ $numberOfRates }} users have rated this book)</span>
                                @else
                                <span> (1 user has rated this book)</span>
                                @endif
                                @else
                                <h5>This book hasn't been rated yet</h5>
                                @endif
                                <p class="bookDescription">{{ $book->description }}</p>
                                @if($isAvailable)
                                <p class="availableMsg">{{$availabilityMessage}}</p>
                                <!-- //! it needs an action -->
                                <a class="borrow waves-effect waves-light  teal darken-2 btn">Borrow</a>
                                @else
                                <p class="unavailableMsg">No books are available</p>
                                @endif
                    </div>
                    <div class="col-3">
                        <div class="stage">
                            <div class="heart"></div>

                            <a href="#" class="like">favorite</a>
                            <a href="#" class="like">unfavorite</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
            </div>
        </div>
        @if ($errors->any())
        <div class="error alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <h5>- {{ $error }}</h5>
                @endforeach
            </ul>
        </div>
        @endif
        @if($canComment)
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <!-- get book id and book category -->
            <input type="hidden" name="bookid" value="{{ $book->id }}" id="bookIDcUSTOM">
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <div class="input-field">
                            <textarea name="comment" id="textarea1" class="materialize-textarea"
                                value="{{ old('comment') }}"></textarea>
                            <label for="textarea1">Enter your comment</label>
                        </div>
                    </div>
                    <input id="comment" type="submit" class="waves-light btn btn-block indigo lighten-1"
                        value="comment" />

                </div>
                <div class="col-4">
                    <ul class="rate-area">
                        <input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing">5
                            stars</label>
                        <input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good">4
                            stars</label>
                        <input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average">3
                            stars</label>
                        <input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good">2
                            stars</label>
                        <input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad">1
                            star</label>
                    </ul>
                </div>
            </div>
        </form>
        @else
        <div class="text-center alert-danger error">
            <h4>
                You have already rated this book
            </h4>
        </div>
        @endif
        <div class="row justify-content-center">
            @foreach ($comments as $comment)
            <div class="col-12">
                <div class="card">
                    <div style="height:50px" class="d-flex  justify-content-around blue darken-1">
                        <h3 class="align-self-center ml-3 text-white ">{{ $comment->name }}</h3>
                        <div class="rating align-self-center ml-5">
                            @for ($i=0;$i<$comment->rate;$i++) <span class="star yellow-text text-darken-2">★</span>
                                @endfor
                                @for ($i=0;$i<(5-$comment->rate);$i++) <span class="star">☆</span>
                                    @endfor
                        </div>
                        @if ($comment->user_id == Auth()->user()->id)
                        <div class="align-self-center">
                            <form action="{{ route('comments.destroy', $comment->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                        @endif

                    </div>
                    <div class=" card-content light-green lighten-4">
                        <p>{{ $comment->dicription }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            @foreach ($relatedBooks as $book)
            <div class="col-2 text-center">
                <a href='/books/{{ $book->id }}'><img style="width:100%;height:190px"
                        src="{{ asset('imgs/cover.jpg') }}" alt=""></a>
                <h3>{{ $book->title }}</h3>
                @if($book->available_copies_no >1)
                <span class='alert-info'>{{ $book->available_copies_no	 }} copies</span>

                @elseif($book->available_copies_no ==1)
                <span class='alert-warning'>1 copy</span>
                @else
                <span class="alert-danger">Not available</span>
                @endif
            </div>
            @endforeach
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">

    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    < script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity = "sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin = "anonymous" >
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    let token = '{{ Session::token() }}';
    let urlLike = '{{ route('like') }}';

    $(function() {
        $(".heart").on("click", function() {
            console.log("nnnnnn")
            $(this).toggleClass("is-active");
        });
    });

    $('.like').on('click',function(event){
     
     console.log(event);
     event.preventDefault();

    // bookId = event.target.parentNode.parentNode.dataset['bookid'];

     bookId = parseInt($("#bookIDcUSTOM").val());
     console.log(bookId);
     let isLike = event.target.previousElementSibling == null;
     $.ajax({
         type: 'POST',
         url: urlLike,
         data: {isLike: isLike, bookId: bookId , _token: token}
     })
         .done(function(){
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this book' : 'favorite' : event.target.innerText == 'unfavorite' ? 'You don\'t like this book' : 'unfavorite';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'unfavorite';
            } else {
                event.target.previousElementSibling.innerText = 'favorite';
            }

            });
    });
    </script>

</body>

</html>