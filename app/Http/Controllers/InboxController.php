<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class InboxController extends Controller
{

    public function index()
    {
        $messages = DB::table('trmessage')->join('msuser', 'userid', 'sentby')->
        where('sentto', session('userid'))->paginate(10);
        return view('User.UserInbox')->with(compact('messages'));
    }


    public function sendMessage(Request $request)
    {
        $valdator = Validator::make($request->all(), ['message' => 'required']);

        if ($valdator->fails()) {
            return redirect('/profile/' . $request->username)->withErrors($valdator);
        } else {
            $message = new Message();
            $message->Message = $request->message;
            $message->SentBy = $request->sender;
            $message->SentTo = $request->receiver;
            $message->SentDate = Carbon::now()->format('Y-m-d H:i:s');
            $message->save();
            return redirect('/profile/' . $request->username);
        }
    }

    public function deleteMessage($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect('/inbox');
    }
}
