<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rkuh_user;

class ValidateUserController extends Controller
{
    function list()
    {
       return rkuh_user::all();
    }
    function testdata($id)
    {
        $user=rkuh_user::find($id);
        if(!$user)
        {
            return response()->json([
            'status'=>500,
            'record'=>0,
            'message'=>'not poper data',
            ],500);
        }
        else
        {
            return response()->json([
            'success'=>200,
            'records'=>1,
            'message'=>'Login Successfully',
            'data'=>$id?rkuh_user::find($id):rkuh_user::all(),
            ],200); 
        } 
    }
}

