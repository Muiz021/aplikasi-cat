<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    ##daftar##
    function daftar(){
        return view('pages.user.daftar');
    }

    function store(Request $request){
       User::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'password' => Hash::make($request->password),
       ]);

       return redirect()->route('login');
    }
    ##end daftar##

    function index(){
        $mahasiswa = User::where('roles','pelajar')->get();
        return view('pages.admin.user.index',compact('mahasiswa'));
    }

}
