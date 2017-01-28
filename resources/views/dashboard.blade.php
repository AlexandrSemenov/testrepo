@extends('layouts.layout')

@section('content')

    {{--@if (Session::has('message'))--}}
        {{--{{ Session::get('message') }}--}}
    {{--@endif--}}


    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What do you have to say?</h3>
                <form action="{{ route('createpost') }}" method="post">
                    <div class="form-group {{ $errors->first('body')? 'has-error' : '' }} {{Session::get('message')? 'has-success' : ''}}" >
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Type some text"></textarea>
                        @if($errors->first('body'))
                            <span class="help-block">{{  $errors->first('body') }}</span>
                        @endif
                        @if(Session::get('message'))
                            <span class="help-block">{{ Session::get('message') }}</span>
                        @endif
                    </div>
                    <input class="btn btn-primary" type="submit" value="Create Post">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </header>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header>
                <h3>What other people say...</h3>
            </header>
            @foreach($posts as $post)
            <article class="post">
                <p>{{ $post->body }}</p>
                <div class="info">
                    Posted by {{$post->user->username}} on {{ $post->created_at }}
                </div>
                <div class="interaction">
                    <a href="#">Like</a> | <a href="#">Dislike</a>
                    @if(Auth::user() == $post->user)
                    | <a class="edit" href="#">Edit</a> | <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Deleted</a>
                    @endif
                </div>
            </article>
            @endforeach
        </div>
    </section>


    <div class="modal fade edit-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label for="post-body">Edit the post</label>
                            <textarea class="form-control" type="text" id="post-body" name="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection