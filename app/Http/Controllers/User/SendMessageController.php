<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SendMessageController extends Controller
{

    public function show()
    {

        return view('dashboard.message.send');
    }

    public function softDelete($id)
    {
        $message = Message::find($id);
        $message->status = 'delete';
        $message->save();
        return redirect()->route('dashboard')->with('success', 'پیام شما با موفقیت حذف گردید.');
    }


    public function showSingle($id)
    {
        $message = Message::find($id);
        $message->status = 'read';
        $message->save();
        return view('dashboard.message.watch', compact('message'));
    }


    public function create(MessageRequest $request)
    {   
        
        $recivers = explode(',', $request->reciver);
        $emailExist = $this->emailsExists($recivers);
        if (isset($recivers) and sizeof($recivers) >= 1 and $emailExist) {
            $confirmSent = $this->sentMessage($request);
            for ( $i= 0; $i < sizeof($recivers);$i++ )
             {
                $key = $recivers[$i];
                $reciver = User::where('email', $key )->first();
                
                $sender = Auth::user()->email;
                $status = 'new';
                        
                //bug here for null arrray
            
                if ($confirmSent) {
                    
                    $userId = $reciver->id;
                    $data = [
                        'title' => $request->title,
                        'body' => strip_tags($request->body),
                        'sender' => $sender,
                        'reciver' => $key,
                        'status' => $status,
                        'user_id' => $userId
                    ];

                    $newMessage = Message::create($data);
                }
                
            }
            return back()->with('success', 'پیام شما با موفقیت ارسال گردید.');

        }

        return back()->with('fail', 'خطا!!!!!! کاربر مورد نظر یافت نشد.');
    }


    private function sentMessage(MessageRequest $request)
    {
        $recivers = explode(',', $request->reciver);
        for ($i= 0; $i < sizeof($recivers);$i++) {
            $reciver = User::where('email', $recivers[$i])->get();
            $sender = Auth::user()->email;
            $userId = Auth::user()->id;
            
            $status = 'sent';

            if (!is_null($reciver)) {
                $data = [
                'title' => $request->title,
                'body' => strip_tags($request->body),
                'sender' => $sender,
                'reciver' => $recivers[$i],
                'status' => $status,
                'user_id' => $userId
            ];

                $sentMessage = Message::create($data);

                
            }
        }
       
        return true;
    }

    private function emailsExists(array $array)
    {
        
        
        for ($i= 0; $i < sizeof($array);$i++) {
            $reciver = User::where('email', $array[$i])->first();
            
        }
        if(is_null($reciver))
        return false;
        else
        return true;
           
    }


    public function showSentSingle($id)
    {

        $message = Message::find($id);

        return view('dashboard.message.watchSent', compact('message'));
    }




    /*

       $reciver = User::where('email',$request->reciver)->first();
        $sender = Auth::user()->email;
        $status = 'new';
        $confirmSent = $this->sentMessage($request);
        //bug here for null arrray 
        if(isset($reciver) and $confirmSent)
        {
            $userId = $reciver->id;
            $data = [
                'title'=> $request->title,
                'body'=> strip_tags($request->body),
                'sender'=> $sender,
                'reciver'=> $request->reciver,
                'status'=> $status,
                'user_id'=> $userId
            ];
            
            $newMessage = Message::create($data);
            if($newMessage)
            {   
                
                return back()->with('success','پیام شما با موفقیت ارسال گردید.');
            }
        }else
        {   
            
            return redirect()->route('dashboard')->with('fail','ایمیل مورد نظر یافت نشد.');
        }

        

 private function sentMessage(MessageRequest $request)
    {
        $reciver = User::where('email', $request->reciver)->get();
        $sender = Auth::user()->email;
        $userId = Auth::user()->id;
        $status = 'sent';

        if (!is_null($reciver)) {
            $data = [
                'title' => $request->title,
                'body' => strip_tags($request->body),
                'sender' => $sender,
                'reciver' => $request->reciver,
                'status' => $status,
                'user_id' => $userId
            ];

            $sentMessage = Message::create($data);

            return true;
        }
    }
    public function showSentSingle($id)
    {

        $message = Message::find($id);

        return view('dashboard.message.watchSent', compact('message'));
    }




*/
}
