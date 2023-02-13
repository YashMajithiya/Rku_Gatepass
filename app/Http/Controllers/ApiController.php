<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    function testdata(Request $req)
    {
        return rkuh_user::where(['email'=>$req->email])->first();        
    }
}
