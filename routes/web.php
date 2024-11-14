<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\FirebaseAuthController;

Route::get('register', [FirebaseAuthController::class, 'showRegisterForm']);
Route::post('register', [FirebaseAuthController::class, 'register']);


Route::get('/', function () {
    return view('register');
});