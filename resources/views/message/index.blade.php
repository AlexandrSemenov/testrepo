@extends('layouts.layout')

@section('content')
<h2>Полученные сообщения</h2>

 <div class="row">
    @foreach($conversations as $conversation)
        <div class="item {{$conversation->readed == 1 ? 'readed': ''}}">
            <a href="{{route('message.show', ['id' => $conversation->id])}}"><h4>{{$conversation->subject}}</h4></a>
            <h5>{{$conversation->created_at}}</h5>
        </div>
    @endforeach
 </div>



@endsection