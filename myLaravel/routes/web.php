<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

Route::get('/mycontroller/{id?}', [MyController::class, 'myfunction']);

Route::post('/mycontroller/{id?}', [MyController::class, 'myfunction']);

Route::get('/', function () {
    return view('home');
});

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
