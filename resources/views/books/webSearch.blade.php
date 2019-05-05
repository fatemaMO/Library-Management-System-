<div class="row">
                    @forelse ($books as $book)
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                            <img class="card-img-top"  src="{{URL::to('/')}}/image/{{$book->image}}" alt="Card image cap" width="100%" height="225" >
                                <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
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
                                        <a href="<?php echo route('book.show', ['id' => $book->id])?>"> View </a>
                                        </div>
                                        <small class="text-muted"> No. of Copies :{{$book->available_copies_no}} </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                    </div>
                   