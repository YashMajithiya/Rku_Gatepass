<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\rkuh_checkinout;

class StudentLeaveController extends Controller
{
    public function store(Request $request)
    {
        $empData =['userid' => $request->userid, 'out_datetime' => $request->out_datetime, 'in_datetime' => $request->in_datetime,'reason' => $request->reason, 'action_datetime' => $request->action_datetime, 'action_by' => $request->action_by,'actual_out_datetime' => $request->actual_out_datetime,'actual_out_by' => $request->actual_out_by,'actual_in_datetime' => $request->actual_in_datetime,'achual_in_by' => $request->achual_in_by,'status' => $request->status,];
		rkuh_checkinout::create($empData);
		return response()->json([
            'status'=>'200',
            'records'=>1,
            'message'=>'Leave Added Successfully',
        ],200);
    }
    public function show($id)
    {
        $rkuh_checkinout=rkuh_checkinout::all();
        return $rkuh_checkinout;
    }
    public function delete($userid,$leaveid)
    {
        $result= rkuh_checkinout::destroy($userid,$leaveid);
        if ($result)
        {
            return response()->json([
            'status'=>200,
            'message'=>'The leave is deleted',
            'records'=>1,
            'data'=>$result
            ]); 
        }
        else
        {
            return response()->json([
            'status'=>500,
            'message'=>'leave deletion failed',
            'records'=>0,
            'data'=>$result
            ]); 
        }
    }
}
    

   
