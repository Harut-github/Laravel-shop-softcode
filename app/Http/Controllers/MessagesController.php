<?php
namespace App\Http\Controllers;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request){

        $users = User::all()->except(Auth::id());

        $messages = Message::orWhere('sender_id', Auth::id())->orWhere('recipient_id', Auth::id())->get();

        $friend_id = $request->session()->get('friend_id');

        return view('pages.mypage.messages',compact('users','messages','friend_id'));
    }

    public function store(Request $request){
        if($request->friend_only_id){

            $request->session()->put('friend_id', $request->friend_only_id);

        }else{

            $request->session()->put('friend_id', $request->friend_id);

            $message = new Message;
            $message->sender_id = Auth::id();
            $message->recipient_id = $request->friend_id;
            $message->sms = $request->sms;
            $message->save();

        }

        $messages = Message::orWhere('sender_id', Auth::id())->orWhere('recipient_id', Auth::id())->get();

        return response()->json(['data'=> $messages]);
    }

}
