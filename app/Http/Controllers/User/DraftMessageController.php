<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageRequest;

class DraftMessageController extends Controller
{
    
    public function create(MessageRequest $request)
    {
        $sender = Auth::user()->email;
        $userId = Auth::user()->id;
        $userReciverExist = User::where('email', $request->reciver)->firstOrFail();
        if ($userId and $userReciverExist ) {
            
            $status = 'draft';
            $data = [
                'title' => $request->title,
                'body' => strip_tags($request->body),
                'reciver' => $request->reciver,
                'sender' => $sender,
                'status' => $status,
                'user_id' => $userId
            ];

            $newMessage = Message::create($data);
            if ($newMessage) {
                
                return back()->with('success', 'پیام شما  در پیشنویس ها ذخیره گردید.');
            } else
                return back()->with('fail', 'لطفا مجدد تلاش کنید.');
        } else
            return back()->with('fail', 'ادرس گیرنده اشتباه است.');
    }


    public function showSingle($id)
    {
        $message = Message::find($id);
        return view('dashboard.message.watchDraft',compact('message'));
    }

    public function update($id)
    {   
        
        $message = Message::find($id);
        $message->status = 'sent';
        $ok = $message->save(); 
        if($ok)
        return back()->with('success', 'پیام شما با موفقیت ارسال گردید.');
    }


    
}

