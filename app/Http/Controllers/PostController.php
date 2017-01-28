<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class PostController extends Controller
{
    public function getDashboard(){
//        $user_id = Auth::user()->id;
//        $posts = Post::with('user')->where('user_id', $user_id)->get();

        $posts = Post::orderBy('created_at', 'desc')->with('user')->get();


        return view('dashboard', ['posts' => $posts]);
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
           'body' => 'required'
        ], [
            'required' => 'Это поле должно быть заполнено'
        ]);

        $post = new Post();
        $post->body = $request['body'];

        $message = 'Что то пошло не так';

        if($request->user()->posts()->save($post)){
            $message = 'Запись успешно создана!';
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        if(Auth::user() != $post->user)
        {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Запись удалена']);
    }
}
