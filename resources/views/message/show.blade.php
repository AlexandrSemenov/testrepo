@extends('layouts.layout')

@section('content')
    <div class="row" style="margin: 30px 0">
        <h4>Сообщения</h4>
        @foreach($messages as $message)
            <div class="message">
                <div class="body">{{$message->message}}</div>
                <div class="create">{{$message->created_at}}</div>
            </div>
        @endforeach
    </div>
    <div class="row" style="margin: 30px 0">
        <form action="{{route('message.answer')}}" method="post">
            <textarea name="message" id="" cols="30" rows="10" placeholder="Текст сообщения..."></textarea>
            <input type="hidden" name="conversation_id" value="{{$message->conversation_id}}">
            <input type="hidden" name="advertisement_id" value="{{$message->advertisement_id}}">
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <input type="submit" value="Отправить">
        </form>
    </div>
@endsection