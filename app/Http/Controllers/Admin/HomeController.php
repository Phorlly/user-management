<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('pages.dashboard');
    }

    public function exit()
    {
        auth()->logout();
        return redirect('/');
    }

    public function error()
    {
        return view('pages.error-404');
    }
}
