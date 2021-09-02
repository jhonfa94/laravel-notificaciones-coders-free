<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class MessageController extends Controller
{
    //MOSTRAR UN MENSAJE
    public function show(Message $message)
    {

        return view('messages.show', compact('message'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|min:5',
            'body' => 'required|min:10',
            'to_user_id' => 'required|exists:users,id'
        ]);

        //Guardamos el mensaje
        $message = Message::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'from_user_id' => Auth::id(),
            'to_user_id' => $request->to_user_id,
        ]);

        $user = User::find($request->to_user_id); # USUARIO A QUIEN SE LE ENVIA LA NOTIFI
        $user->notify(new MessageSent($message));

        return redirect()->route('dashboard')->with('saveMessage','Mensaje guardado correctamente');

    }
}
