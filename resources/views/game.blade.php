@extends('layouts.layout')

@section('content')
    <div class="row">
        <h3 style="text-align: center">Добавить новую игру</h3>
        <div class="col-md-offset-4 col-md-4">
            <form action="{{route('game.create')}}" method="post">
                <div class="form-group {{ $errors->first('name')? 'has-error' : '' }}">
                    <input class="form-control" type="text" name="name" value="{{Request::old('name')}}" placeholder="game name">
                    @if($errors->first('name'))
                        <span class="help-block">{{  $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->first('description')? 'has-error' : ''}}">
                    <textarea class="form-control" type="text" name="description" value="" placeholder="game description">{{Request::old('description')}}</textarea>
                    @if($errors->first('description'))
                        <span class="help-block">{{  $errors->first('description') }}</span>
                    @endif
                </div>
                <input class="btn btn-primary" type="submit" value="create">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <h3>Все игры:</h3>
            @foreach($games as $game)
                <div class="title">Название игры: {{$game->name}}</div>
                <div class="description">Описание игры: {{$game->description}}</div>
                <a class="btn btn-primary" href="{{ route('game.edit', ['id' => $game->id]) }}">Edit</a>
                -----------------------------------------------------------------------
            @endforeach
        </div>
    </div>
@endsection