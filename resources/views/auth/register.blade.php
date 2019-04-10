@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:10em;margin-bottom:5em;">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card w3-card-2">
                <div class="card-header text-center"><h4>{{ __('Register') }}</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4 w3-margin-bottom">
                                <input id="fname" type="text" placeholder="First Name" 
                                        class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" 
                                       name="fname" value="{{ old('fname') }}" required autofocus>
                                @if ($errors->has('fname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fname') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-4 w3-margin-bottom">
                                <input id="lname" type="text" placeholder="Last Name" 
                                        class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" 
                                       name="lname" value="{{ old('lname') }}" required autofocus>
                                @if ($errors->has('lname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lname') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-4 w3-margin-bottom">
                                <input id="mname" type="text" placeholder="Middle Name" 
                                        class="form-control{{ $errors->has('mname') ? ' is-invalid' : '' }}" 
                                       name="mname" value="{{ old('mname') }}" required autofocus>
                                @if ($errors->has('mname'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('mname') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4 w3-margin-bottom">
                                {{-- {{Form::file('profile_picture')}} --}}
                                <input id="profile_picture" type="file" class="form-control{{ $errors->has('profile_picture') ? ' is-invalid' : '' }}" 
                                       placeholder="Profile" value="photo" name="profile_picture" value="{{ old('profile_picture') }}">
                                @if ($errors->has('profile_picture'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-4 w3-margin-bottom">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                       placeholder="E-mail Address" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-4 w3-margin-bottom">
                                <input id="contact_no" type="text" class="form-control{{ $errors->has('contact_no') ? ' is-invalid' : '' }}" 
                                       name="contact_no" placeholder="Contact no." value="{{ old('contact_no') }}" required>
                                @if ($errors->has('contact_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contact_no') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 w3-margin-bottom">
                                <select class="form-control {{ $errors->has('pid') ? ' is-invalid' : '' }}" id="pid"
                                        name="pid" value="{{ old('pid') }}" required>
                                    <option value="1">Negros Occidental</option>
                                </select>
                                @if ($errors->has('pid'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('pid') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 w3-margin-bottom">
                                <select class="form-control {{ $errors->has('cid') ? ' is-invalid' : '' }}" id="cid"
                                        name="cid" value="{{ old('cid') }}" required>
                                    <option value="1">Sagay City</option>
                                </select>
                                @if ($errors->has('cid'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cid') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 w3-margin-bottom">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                       placeholder="password" name="password" required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 w3-margin-bottom">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                       placeholder="confirm password" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <center>
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Register') }}
                                    </button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
