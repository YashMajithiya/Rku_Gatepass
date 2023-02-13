<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rkuh_checkinout;

class SecurityLeaveController extends Controller
{
    public function securityactionleave(Request $request)
    {
        $rkuh_checkinout=new rkuh_checkinout;
            $leaveid= $request->leaveid;
            $action_by= $request->actionById;
            $action_datetime= $request->actionDateTime;
    
            if($action_by!=' ' && $leaveid!=' ' && $action_datetime!=' ')
            {
            return response()->json([
                'status'=>500,
                'records'=>1,
                'message'=>'Leave not approved',
                'data'=>[]
            ],500);
        }
        else
        {
            return response()->json([
            'status'=>200,
            'records'=>0,
            'message'=>'Leave approved',
            'data'=>[]
            ],200);
        }
    }
}
    
