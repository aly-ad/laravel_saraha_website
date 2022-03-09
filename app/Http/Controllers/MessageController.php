<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MessageController extends Controller
{
    public function index() {
        $messages = Auth::user()->messages;
        return view('my-messages')->with(compact('messages'));
    }


    public function create($id)
    {
        $user = User::findOrFail($id);
        if($user->id==Auth::id()) {
           return redirect()->route('profile.edit')->with('error','you cannot send message to ur self');
        }  else{
            $user->no_of_visits +=1;
            $user->save();
            return view('message')->with(compact('user'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($id, Request $request)
    {
        $request->validate([
            'content' => 'required|string|min:3|max:500'
        ]);

        Message::create([
            'user_id' => $id,
            'content' => $request->input('content')
        ]);

        return redirect()->route('message.create', $id)->with('success', 'تم ارسال الرسالة بنجاح');
    }
//UDeJeE%MnlBOJa1*fU)@
}
