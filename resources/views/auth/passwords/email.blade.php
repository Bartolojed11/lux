@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:17em;margin-bottom:3em;min-height:400px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card w3-card-2">
                <div class="card-header text-center"><h4>{{ __('Reset Password') }}</h4></div>

                <div class="card-body" style="padding-top:2em;margin-bottom:2em;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <input id="email" type="email" placeholder="E-mail address" 
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                    name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info btn-sm">
                                    {{ __('Send Password Reset Link') }}
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
