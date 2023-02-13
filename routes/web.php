<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\checkcontroller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::post("login",[UserController::class,'login']);
Route::get("/dashboard",[EmployeeController::class,'dashboard']);


Route::get('/rku_user', [EmployeeController::class, 'index']);
Route::post('/store', [EmployeeController::class, 'store'])->name('store');
Route::get('/fetchall', [EmployeeController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [EmployeeController::class, 'delete'])->name('delete');
Route::get('/edit', [EmployeeController::class, 'edit'])->name('edit');
Route::post('/update', [EmployeeController::class, 'update'])->name('update');

Route::get('/checkinout', [checkcontroller::class, 'checkinout']);
Route::post('/storeinout', [checkcontroller::class, 'storeinout'])->name('storeinout');
Route::get('/fetchallinout', [checkcontroller::class, 'fetchAllinout'])->name('fetchAllinout');
Route::delete('/deleteinout', [checkcontroller::class, 'deleteinout'])->name('deleteinout');
Route::get('/editinout', [checkcontroller::class, 'editinout'])->name('editinout');
Route::post('/updateinout', [checkcontroller::class, 'updateinout'])->name('updateinout');



