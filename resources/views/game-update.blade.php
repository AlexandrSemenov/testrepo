@extends('layouts.layout')

    @section('content')
        <div class="row">
            <h3 style="text-align: center">Добавить новую игру</h3>
            <div class="col-md-offset-4 col-md-4">
                <form action="{{route('game.update', ['id' => $game->id])}}" method="post">
                    <div class="form-group {{ $errors->first('name')? 'has-error' : '' }}">
                        <input class="form-control" type="text" name="name" value="{{$game->name}}" placeholder="game name">
                        @if($errors->first('name'))
                            <span class="help-block">{{  $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->first('description')? 'has-error' : ''}}">
                        <textarea class="form-control" type="text" name="description" placeholder="game description">{{$game->description}}</textarea>
                        @if($errors->first('description'))
                            <span class="help-block">{{  $errors->first('description') }}</span>
                        @endif
                    </div>
                    <input class="btn btn-primary" type="submit" value="update">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </div>
        </div>
    @endsection
