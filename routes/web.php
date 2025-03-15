<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserValidate;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RoomController;

Route::view('avedan', 'other.index');



Route::get('/', [UserController::class,'validate'])->middleware('iflogin');
Route::post('validate', [UserValidate::class,'authenticate']);
Route::get('logout', [UserValidate::class,'logout']);

Route::get("login", function() {
    return view("login");
});
Route::get("register", function() {
    return view("register");
});

Route::resource('users', UserController::class);
Route::post('/message', [MessageController::class,'index']);
Route::post('/message/write', [MessageController::class,'store']);
Route::post('/store', [UserController::class, 'store'])->name('store.user');
