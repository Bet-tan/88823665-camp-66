<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    function index(){
        return view('login');
    }

    function login(Request $req){
        // Fetch user by email
        $user = User::where('email', $req->email)->first();

        // Check if user exists and password is correct
        if($user && Hash::check($req->password, $user->password)){
            $req->session()->put('user', $user);
            return redirect('/users'); // Redirect to /users if correct
        }
        else{
            return redirect('/login')->with('error', 'Please recheck your credentials.');
        }
    }
}
