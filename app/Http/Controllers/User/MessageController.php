<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //show messages

public function showMesssage()
{       
  
        $user = User::find(Auth::user()->id);
        $messages = $user->messages()->where('status','new')->orWhere('status','read')->get();
    
    return view('dashboard.message.message',compact('messages'));
}



    public function draftMessage()
    {       
        $user = User::find(Auth::user()->id);
        $messages = $user->messages()->where('status','draft')->get();
        return view('dashboard.message.draft',compact('messages'));
    }


    public function sentMessage()
    {   
        $user = User::find(Auth::user()->id);
        $messages = $user->messages()->where('status','sent')->get();
        return view('dashboard.message.sent',compact('messages'));
    }


    public function deleteMessage()
    {   
        $user = User::find(Auth::user()->id);
        $messages = $user->messages()->where('status','delete')->get();
        return view('dashboard.message.delete',compact('messages'));
    }


}
