@extends('layouts.layout')

@section('content')
    <div class="form-wrapp" style="margin: 30px 0">
        <form action="{{route('advert.create')}}" method="post">
            <input type="text" name="title" placeholder="Title">
            <input type="submit" value="submit">
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>


@endsection