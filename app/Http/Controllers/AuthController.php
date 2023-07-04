<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login()
    {
        return view('pages.user.login');
    }

    function proses_login(LoginRequest $request)
    {
        $kredensil = $request->only('username', 'password');

        if (Auth::attempt($kredensil)) {
            Auth::user();
            if (Auth::user()->roles == 'admin') {
                return redirect()->route('admin.dashboard');
            }elseif(Auth::user()->roles == 'pelajar'){
                return redirect()->route('pelajar.dashboard');
            }
        }else{
            return redirect()->back();
        }
        return redirect()->back();
    }

    function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
