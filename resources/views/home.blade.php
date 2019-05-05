@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{-- <div class="card-header">Dashboard</div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="top">  You are logged in!</div>

                </div>
            </div>

            </div>

                    <div class="title m-b-md">
                        <img src="{{ asset('imgs/head.jpg') }}"alt="Smiley face" width="1365">
                    </div>
        </div>
    </div>
</div>
@endsection
