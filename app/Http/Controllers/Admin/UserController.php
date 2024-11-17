<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Mail\UserMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    private $items;
    private $roles;

    public function __construct()
    {
        $this->middleware('is.authed');
        $this->roles = Role::whereNotIn('role', ['super_admin'])->get();
        $this->items = User::with('role')->where('role_id', '!=', 1)->get();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd($this->getId());
        return view('pages.user', ['items' => $this->items->where('id', '!=', auth()->id())]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.user.create', ['roles' => $this->roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|min:6',
                'role' => 'required|integer|exists:roles,id',
            ]);

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id' => $request->input('role'),
            ]);

            // $details = [
            //     'name' => $request->input('name'),
            //     'email' => $request->input('email'),
            //     'password' => $request->input('password')
            // ];
            // Mail::to($request->input('email'))->send(new UserMail($details));

            return okOrFail();
        } catch (\Exception $err) {
            return okOrFail($err->getMessage(), 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = User::with('role')->findOrFail($id);

        return view('forms.user.show', ['roles' => $this->roles, 'item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::with('role')->findOrFail($id);

        return view('forms.user.edit', ['roles' => $this->roles, 'item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|min:6',
                'role' => 'required|integer|exists:roles,id',
            ]);
            $item = User::findOrFail($id);
            if ($request->password) {
                $password = Hash::make($request->input('password'));
            } else {
                $password = $item->password;
            }

            $item->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $password,
                'role_id' => $request->input('role'),
            ]);

            return backToList('users');
        } catch (\Exception $err) {
            return okOrFail($err->getMessage(), 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            User::findOrFail($id)->delete();

            return backToList('users');
        } catch (\Exception $err) {
            return okOrFail($err->getMessage(), 'error');
        }
    }
}
