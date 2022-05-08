<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;

class DeleteMessageController extends Controller
{
    public function showSingle($id)
    {
        $message = Message::find($id);
        return view('dashboard.message.watchDelete',compact('message'));
    }

    public function delete($id)
    {   
        
        $deleteMessage = Message::destroy($id);
        if($deleteMessage)
        { 
            return redirect()->route('delete.message')->with('success','پیام شما حذف گردید!');
        }
    }
}
