@extends('layouts.layout')

@section('content')
    <div class="col-md-3" style="margin-top: 50px;">
        <form action="">
            <div class="form-group">
                <label for="">Artists</label>
                <select class="form-control" name="artist" id="">
                    @foreach($form->getArtistList() as $artist)
                        <option value="{{$artist}}">{{$artist}}</option>
                    @endforeach
                </select>
                <label for="" style="margin-top: 10px;">Albums</label>
                <select class="form-control" name="artist" id="">
                    @foreach($form->getAlbumsList() as $album)
                        <option value="{{$album}}">{{$album}}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

@endsection