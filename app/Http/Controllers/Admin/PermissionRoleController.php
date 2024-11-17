<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PermissionRoleController extends Controller
{
    private $roles;
    private $items;
    private $permissions;

    public function __construct()
    {
        $this->items = Permission::with('roles')->whereHas('roles')->get();
        $this->roles = Role::whereNotIn('role', ['super_admin'])->get();
        $this->permissions = Permission::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.permission-role', ['items' => $this->items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.permission-role.create', [
            'roles' => $this->roles,
            'permissions' => $this->permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'permission' => 'required|integer',
                'role' => 'required|integer'
            ]);

            $check = PermissionRole::where([
                'role_id' => $request->role,
                'permission_id' => $request->permission,
            ])->first();

            if ($check) {
                return oKOrFail('Permission is already assigned to roles.', 'error');
            }
            PermissionRole::create([
                'role_id' => $request->role,
                'permission_id' => $request->permission
            ]);

            return oKOrFail();
        } catch (\Exception $err) {
            return oKOrFail($err->getMessage(), 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Permission::with('roles')->findOrFail($id);

        return view('forms.permission-role.show', [
            'roles' => $this->roles,
            'item' => $item,
            'permissions' => $this->permissions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $item = Permission::with('roles')->findOrFail($id);

        return view('forms.permission-role.edit', [
            'roles' => $this->roles,
            'item' => $item,
            'permissions' => $this->permissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validate the request
            $request->validate([
                'permission' => 'required|exists:permissions,id',
                'roles' => 'required|array|exists:roles,id'
            ]);
            Permission::findOrFail($id)->roles()->sync($request->input('roles'));

            return backToList('permission-roles');
        } catch (\Exception $err) {
            return oKOrFail($err->getMessage(), 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            PermissionRole::where('permission_id', $id)->delete();

            return backToList('permission-roles', 'Removed');
        } catch (\Exception $err) {
            return oKOrFail($err->getMessage(), 'error');
        }
    }
}
