<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        if(Auth::user())
        {
//            $advertisement_id = DB::table('advertisements')->where('user_id', Auth::user()->id)->first()->id;

            $conversations = Conversation::where('user_id', Auth::user()->id)->get();

            return view('message.index', ['conversations' => $conversations]);
        }
        return redirect()->route('welcome');
    }

    public function showMessage($id)
    {
        $messages = Message::where('conversation_id', $id)->get();
        $conversation = Conversation::find($id);

        $conversation->readed = 1;
        $conversation->update();

        return view('message.show', ['messages' => $messages]);
    }
    public function answerMessage(Request $request)
    {

        $message = new Message();
        $message->message = $request['message'];
        $message->user_id= Auth::user()->id;
        $message->conversation_id =  $request['conversation_id'];
        $message->advertisement_id = $request['advertisement_id'];
        $message->save();

        return redirect()->back();

    }
}
