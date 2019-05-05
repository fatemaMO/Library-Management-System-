@extends('layouts.adminNav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="top">
                   <h1 style="color: #1dbab4; text-align:center"> You are logged in!</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="title m-b-md">
            <img src="{{ asset('imgs/head.jpg') }}"alt="Smiley face" width="1365">
        </div>
    </div>
</div>
@endsection
