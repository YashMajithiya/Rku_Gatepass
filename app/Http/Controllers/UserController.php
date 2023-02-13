<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\rkuh_user;

class UserController extends Controller
{

    function login(Request $req)
    {
        $user= rkuh_user::where(['email'=>$req->email])->first();
        if(!$user)
        {
            return redirect('login');
        }
        else{
            $req->session()->get('user',$user);
            return redirect('dashboard');
            }
}
}


