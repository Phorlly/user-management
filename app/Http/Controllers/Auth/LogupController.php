<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class LogupController extends Controller
{
    //load signup form
    public function index()
    {
        return view('forms.auth.logup');
    }

    //process signup form submission
    public function logup(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ]);

            $role = Role::where('role', 'user')->first();
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'role_id' => $role ? $role->id : 0,  //assign user role as 'user' by default
                'password' => Hash::make($validated['password']),
            ]);

            return redirect()->route('in')->with('success', "Account created successfully");
        } catch (\Exception $err) {
            return oKOrFail($err->getMessage(), 'error');
        }
    }
}
