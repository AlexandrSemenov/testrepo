<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{
    public function index()
    {
        return view('advert.index');
    }

    public function createAdv(Request $request)
    {
        $adv = new Advertisement();
        $adv->title = $request['title'];
        $adv->user_id = Auth::user()->id;
        $adv->save();

        return redirect()->route('advert.index');
    }

    public function showAdv($id)
    {
        $advertisement = Advertisement::find($id);
        return view('advert.show', ['advertisement'=>$advertisement]);
    }

    public function addMessage(Request $request)
    {

        if(Auth::user())
        {
            /* проверяем создан ли разговор ранее */
            $conv = DB::table('conversations')->where('advertisement_id', $request['advert_id'])->where('user_id', Auth::user()->id)->get();

            if(count($conv) > 0)
            {
                $message = new Message();
                $message->message = $request['message'];
                $message->user_id= Auth::user()->id;
                $message->conversation_id =  Auth::user()->conversations()->where('advertisement_id', $request['advert_id'])->get()->first()->id;
                $message->advertisement_id = $request['advert_id'];
                $message->save();

            }else{
                $user = Auth::user();

                $conversation = new Conversation();
                $conversation->subject = $request['subject'];
                $conversation->advertisement_id = $request['advert_id'];
                $conversation->user_id = $user->id;
                $conversation->save();

                $conversation->users()->save($user);

                $message = new Message();
                $message->message = $request['message'];
                $message->user_id= Auth::user()->id;
                $message->conversation_id = Auth::user()->conversations()->where('advertisement_id', $request['advert_id'])->get()->first()->id;
                $message->advertisement_id = $request['advert_id'];
                $message->save();
            }

            return redirect()->back();
        }

        return redirect()->route('welcome');

    }

}
