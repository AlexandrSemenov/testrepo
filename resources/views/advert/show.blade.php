@extends('layouts.layout')

@section('content')

    <h2 style="margin: 30px 0">{{$advertisement->title}}</h2>

    <h3>Добавить сообщение</h3>
    <form action="{{route('advert.addmessage')}}" method="post">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="enter message"></textarea>
        <input type="hidden" name="advert_id" value="{{$advertisement->id}}">
        <input type="hidden" name="subject" value="{{$advertisement->title}}">
        <input type="submit" value="submit">
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>

@endsection