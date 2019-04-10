@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:8em;margin-bottom:3em;">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="w3-card-2">
                <div class="card-header text-center"><h3>{{ __('Login') }}</h3></div>
                <div class="card-body" style="padding:2em;">
                    <center>
                        <img src="{{asset('img/img_avatar3.png')}}" class="card-img-top rounded-circle"
                        style="width:50%" alt="login avatar">
                    </center>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row ">
                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info btn-md" style="width:100%;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a class="text-info" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>   
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
