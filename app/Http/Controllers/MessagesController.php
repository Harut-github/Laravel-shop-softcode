<?php
namespace App\Http\Controllers;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(){

        $users = User::all()->except(Auth::id());

        $messages = Message::with("users")->orWhere('sender_id', Auth::id())->orWhere('recipient_id', Auth::id())->get();

        dd($messages);

        return view('pages.mypage.messages',compact('users','messages'));
    }

    public function store(Request $request){
        $message = new Message;
        $message->sender_id = Auth::id();
        $message->recipient_id = $request->friend_id;
        $message->sms = $request->sms;
        $message->save();

        return redirect()->back();
    }
}
