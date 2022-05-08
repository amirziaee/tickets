<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CheckUserRequest;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function DoLogin(CheckUserRequest $CheckUserRequest)
    {
  
        $auth = Auth::attempt(['email' => $CheckUserRequest->email, 'password' => $CheckUserRequest->password]);

        if($auth)
        {  
            return redirect()->route('dashboard');
        }else{
            
            return back()->with('fail','رمز یا نام کاربری اشتباه می باشد.');
        }

    }


    public function register()
    {
        return view('auth.register');
    }



    public function DoRegister(CreateUserRequest $CreateUserRequest)
    {
 
        $data= [
            'fullname'=> $CreateUserRequest->fullname,
            'email'=> $CreateUserRequest->email,
            'password'=> Hash::make($CreateUserRequest->password)
        ];

        $Created = User::create($data);

        if($Created)
        {
            return back()->with('success','ثبت نام با موفقیت انجام شد.');
        }

    }

    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect()->route('login')->with('success','با موفقیت خارج شدید.');
        }

       
        
    }



}
