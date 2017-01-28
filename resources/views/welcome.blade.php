@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-3">
            <h3>Sign up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->first('email')? 'has-error' : '' }}" >
                    <label for="email">Your email</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}" autocomplete='off'>
                    @if ($errors->first('email'))
                        <span class="help-block">{{  $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->first('username')? 'has-error' : '' }}">
                    <label for="username">Your username</label>
                    <input class="form-control" type="text" name="username" value="{{ Request::old('username') }}" id="username" autocomplete='off'>
                    @if ($errors->first('username'))
                        <span class="help-block">{{  $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group {{ $errors->first('password')? 'has-error' : '' }}">
                    <label for="password">Your password</label>
                    <input class="form-control" type="password" name="password" value="{{ Request::old('password') }}" id="password" autocomplete='off'>
                    @if ($errors->first('password'))
                        <span class="help-block">{{  $errors->first('password') }}</span>
                    @endif
                </div>
                <input class="btn btn-success" type="submit" value="submit">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        <div class="col-md-offset-2 col-md-3">
            <h3>Sign in</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group {{ $errors->first('email')? 'has-error' : '' }}">
                    <label for="email">Your email</label>
                    <input class="form-control" type="text" name="email" value="{{ Request::old('email') }}" id="email" autocomplete='off'>
                    @if ($errors->first('email'))
                        <span class="help-block">{{  $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group {{ $errors->first('password')? 'has-error' : '' }}">
                    <label for="password">Your password</label>
                    <input class="form-control" type="password" name="password" value="{{ Request::old('password') }}" id="password" autocomplete='off'>
                    @if ($errors->first('password'))
                        <span class="help-block">{{  $errors->first('password') }}</span>
                    @endif
                </div>
                <input class="btn btn-success" type="submit" value="submit">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection