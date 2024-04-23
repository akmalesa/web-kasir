<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function halamanlogin() {
        return view('login.index');
    }


    public function postlogin(Request $request) {
        if(Auth::attempt($request->only('email', 'password'))){
        return redirect('/home');
    }
    return redirect('/');

    }
}
