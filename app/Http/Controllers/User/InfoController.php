<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Information;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreInfoRequest;

class InfoController extends Controller
{
    //show
    public  function showInfo()
    {   
        //check user insert full information
        $completed = Auth::user()->completed;

        //find user and get user inforamtions
        $user = User::find(1);
        $info = $user->Information;


        return view('dashboard.info.info',compact(['completed','info','user']));
    }
    //insert

    public function create(StoreInfoRequest $request)
    {

        $imageName = time().'_'.date('Y').'.'.$request->image->getClientOriginalExtension();
        $imageSize = $request->file('image')->getSize();
        $user_id = Auth::user()->id;
    
        $data = [
            'age' => $request->age,
            'phone' => $request->phone,
            'city' => $request->city,
            'country' => $request->country,
            'image_name'=> $imageName,
            'image_size'=> $imageSize,
            'user_id' => $user_id

        ];       


      
       
        $insertinfo = Information::create($data);

        //check data correclty inserted

        if($insertinfo )
        {
            $this->infoCompleted($user_id);
            $request->image->move(public_path('uploads'),$imageName);
        }
        


       return redirect()->route('info')->with('success','اطلاعات شما با موفقیت ذخیره گردید');
    }




    private function infoCompleted($id)
    {
        $user = User::find($id);
        $user->completed = '1';
        $user->save();
    }
    //update



    public function showUpdate($id)
    {  
        
        $information = Information::findOrFail($id);
        return view('dashboard.info.infoupdate',compact('information'));
    }

    public function update(StoreInfoRequest $request,$id)
    {

        
        $imageName = time().'_'.date('Y').'.'.$request->image->getClientOriginalExtension();
        $imageSize = $request->file('image')->getSize();
        $user_id = Auth::user()->id;
    
        $data = [
            'age' => $request->age,
            'phone' => $request->phone,
            'city' => $request->city,
            'country' => $request->country,
            'image_name'=> $imageName,
            'image_size'=> $imageSize,
            'user_id' => $user_id

        ];       
        
        $updateinfo = Information::find($request->id)->update($data);
       

        //check data correclty updated

 
            //$updateinfo->update($updateinfo);
            $request->image->move(public_path('uploads'),$imageName);
        
        


       return redirect()->route('info')->with('success','اطلاعات شما با موفقیت به روز رسانی گردید');
        
    }
    //delete
    
}
