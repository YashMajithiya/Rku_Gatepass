<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentLeaveController;
use App\Http\Controllers\Api\AdminLeaveController;
use App\Http\Controllers\Api\SecurityLeaveController;
use App\Http\Controllers\Api\ValidateUserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('list',[DeviceContoller::class,'list']);
Route::get("ValidateUser/{email?}",[ValidateUserController::class,'testdata']);
Route::post('students',[StudentLeaveController::class,'store']);
Route::get("getmyleave/{id}",[StudentLeaveController::class,'show']);
Route::delete('deletemyleave/{userid}{leaveid}',[StudentLeaveController::class,'delete']);
Route::get("getadminallleave/{id}",[AdminLeaveController::class,'adminleave']);
Route::post('AdminActionLeave',[AdminLeaveController::class,'adminactionleave']);
Route::get("adminleavedetail/{id}",[AdminLeaveController::class,'adminleavedetail']);
Route::post('SecurityActionLeave',[SecurityLeaveController::class,'securityactionleave']);





