<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rkuh_user;
use App\Models\rkuh_checkinout;

class AdminLeaveController extends Controller
{
    function adminleave($id)
    {
        $result=rkuh_user::find($id);
    }
    public function adminactionleave(Request $request)
    {
        $rkuh_checkinout=new rkuh_checkinout;
        $leaveid= $request->leaveid;
        $status= $request->status;
        $action_by= $request->action_by;
        $action_datetime= $request->action_datetime;
        if($action_by=='2' && $leaveid!=' ' && $status!=' ' && $action_datetime!=' ')
        {
            return response()->json([
            'status'=>200,
            'records'=>1,
            'message'=>'Leave Added succesfully',
            'data'=>[]
            ],200);
        }
        else
        {
            return response()->json([
            'status'=>500,
            'records'=>0,
            'message'=>'Leave details missing',
            'data'=>[]
             ],500);
        }
    }
    function adminleavedetail($id)
    {
        $result= rkuh_checkinout::find($id);
        if($result!='0')
        {
            return response()->json([
            'status'=>200,
            'records'=>1,
            'message'=>'Leaves are there',
            'data'=>[]
            ],200);
        }
        else
        {
        return response()->json([
            'status'=>500,
            'records'=>1,
            'message'=>'Leaves are not there',
            'data'=>$result
            ],500);
        }
    }
}

