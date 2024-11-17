<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //load login form
    public function index()
    {
        return view('forms.auth.login');
    }

    //login user with email and password
    public function login(Request $request)
    {
        try {
            $remember = $request->remember ? true : false;
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials, $remember)) {
                return redirect()->route('dashboard');
            }

            return oKOrFail("Email & Password incorrect!", 'error');
        } catch (\Exception $err) {
            return oKOrFail($err->getMessage(), 'error');
        }
    }
}
