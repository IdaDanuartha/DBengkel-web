<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        return view('dashboard.messages.index', [
            "title" => "Messages",
            "messages" => Message::latest()->paginate(15)
        ]);
    }

    public function sendMessage(Request $request)
    {
        $message = new Message();

        $message->user_id = Auth::id();
        $message->first_name = Auth::user()->first_name;
        $message->last_name = Auth::user()->last_name;
        $message->email = Auth::user()->email;
        $message->message = $request->input('message');

        $message->save();

        return back()->with('status', 'Thanks for your message, ' . Auth::user()->first_name . ' ' . Auth::user()->last_name);
    }
}
