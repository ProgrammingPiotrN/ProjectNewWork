<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('includes.dashboard.chat', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        if (auth()->check()) {
            $message = new Message();
            $message->content = $request->content;
            $message->user_id = auth()->user()->id;
            $message->save();
        } else {
            // Obsługa przypadku, gdy użytkownik nie jest zalogowany
            // Możesz przekierować użytkownika do strony logowania lub zwrócić odpowiedni komunikat
        }

        return redirect()->back();
    }
}
