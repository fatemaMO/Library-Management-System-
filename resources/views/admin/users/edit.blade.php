@extends('layouts.adminNav')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('users.update', ['id' => $user->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="@if(old('name')){{ old('name') }}@else{{$user->name}}@endif" required autocomplete="name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="@if(old('username')){{ old('username') }}@else{{$user->username}}@endif" required autocomplete="username" autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="@if(old('email')){{ old('email') }}@else{{$user->email}}@endif" required autocomplete="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="@if(old('phone')){{ old('phone') }}@else{{$user->phone}}@endif"  autocomplete="phone" autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="national_id" class="col-md-4 col-form-label text-md-right">{{ __('national_id') }}</label>

                            <div class="col-md-6">
                                <input id="national_id" type="number" class="form-control{{ $errors->has('national_id') ? ' is-invalid' : '' }}" name="national_id" value="@if(old('national_id')){{ old('national_id') }}@else{{$user->national_id}}@endif"  autocomplete="national_id" autofocus>

                                @if ($errors->has('national_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('national_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select id="type"  class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('type') }}">
                                    <option value="">Please choose a type</option>
                                        <option value="manager">Manager</option>
                                        <option value="user">User</option>

                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
