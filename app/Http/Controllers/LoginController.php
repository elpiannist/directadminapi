<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function logIn(Request $request)
    {
        $auth = base64_encode($request->input('login').':'.$request->input('passwd'));
        $cookie = cookie('auth', $auth, 60);
        return redirect('/')->cookie($cookie);
    }

    public function loginView()
    {
        return view('login');
    }
}
