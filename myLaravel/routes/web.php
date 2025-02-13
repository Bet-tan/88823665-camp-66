<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckLogin;

// User Routes (Halfly Protected)
Route::middleware([CheckLogin::class])->group(function(){
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user{id}', [UserController::class, 'edit']);
    Route::put('/user', [UserController::class, 'edit_action']);
    Route::delete('/user', [UserController::class, 'delete']);
});

// Login Routes
Route::get('/', [HomeController::class, 'index'])->middleware([CheckLogin::class]);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', function(){
    session()->forget('user');
    return redirect('/login');
});

// Register Routes
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'create']);

// Home Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);



// MyController Routes
Route::match(['get', 'post'], '/mycontroller/{id?}', [MyController::class, 'myfunction']);

// Simple Hello Route
Route::get('/hello/{id?}', function ($val = null) {
    return "<h1>Hello World " . ($val ?? '') . "</h1>";
});

// Multiplication Table Route
Route::match(['get', 'post'], '/multiplication', function (Illuminate\Http\Request $request) {
    $multiplicationTable = [];
    $number = $request->input('number');

    if ($number) {
        for ($i = 1; $i <= 12; $i++) {
            $multiplicationTable[] = $number * $i;
        }
    }

    return view('multi', compact('number', 'multiplicationTable'));
});
