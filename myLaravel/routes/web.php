<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

Route::post('/register', [RegisterController::class, 'create']);

Route::get('/mycontroller/{id?}', [MyController::class, 'myfunction']);

Route::post('/mycontroller/{id?}', [MyController::class, 'myfunction']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'edit']);
Route::put('/user/{id}', [UserController::class, 'edit_action']);
Route::delete('/user', [UserController::class, 'delete']);

Route::get('/mycontroller/{id?}', [MyController::class, 'myfunction']);
Route::post('/mycontroller/{id?}', [MyController::class, 'myfunction']);

route::get('/hello/{id?}', function ($val= null) {
    return "<h1>Hello World $val</h1>";
});

Route::match(['get', 'post'], '/multiplication', function (Illuminate\Http\Request $request) {
    $multiplicationTable = [];
    $number = null;

    // Check if submitted?
    if ($request->isMethod('post')) {
        $number = $request->input('number');
        // Generate multiplication table for entered number
        for ($i = 1; $i <= 12; $i++) {
            $multiplicationTable[] = $number * $i;
        }
    }

    // Return 'multi' view with data
    return view('multi', compact('number', 'multiplicationTable'));
});
