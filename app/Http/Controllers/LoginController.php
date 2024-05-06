<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function halamanLogin() {
        if($user = Auth::user()){
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pemesanan');
                    break;
            }
        }
        return view('login.index');
    }

    function cekLogin(AuthRequest $request){
        $credential = $request->only('email', 'password');

        $request->session()->regenerate();
        if(Auth::attempt($credential)) {
            $user = Auth::user();
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/');
                    break;

                case '2':
                    return redirect()->intended('pemesanan');
                    break;
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'nofound' => 'Email atau password salah'
        ])->onlyInput('email');
    }


}
