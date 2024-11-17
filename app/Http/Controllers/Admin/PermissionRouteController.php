<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\PermissionRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PermissionRouteController extends Controller
{
    private $permissions;
    private $items;

    public function __construct()
    {
        $this->items = PermissionRoute::orderBy('id', 'desc')->with('permission')->get();
        $this->permissions = Permission::all();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.permission-route', [
            'permissions' => $this->permissions,
            'routes' => renderRoute(),
            'items' => $this->items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.permission-route.create', [
            'permissions' => $this->permissions,
            'routes' => renderRoute(),
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
                'route' => 'required|string',
            ]);

            $check = PermissionRoute::where(['permission_id' => $request->permission, 'route' => $request->route])->first();

            if ($check) {
                return oKOrFail('Permission is already assigned.', 'error');
            }
            PermissionRoute::create([
                'route' => formatRouteName($request->route),
                'name' => $request->route,
                'permission_id' => $request->permission,
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
        $item = PermissionRoute::with('permission')->findOrFail($id);

        return view('forms.permission-route.show', [
            'permissions' => $this->permissions,
            'routes' => renderRoute(),
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = PermissionRoute::with('permission')->findOrFail($id);

        return view('forms.permission-route.edit', [
            'permissions' => $this->permissions,
            'routes' => renderRoute(),
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'permission' => 'required|integer',
                'route' => 'required|string|unique:permission_routes,route,' . $id,
            ]);
            PermissionRoute::with('permission')
                ->findOrFail($id)
                ->update([
                    'route' => formatRouteName($request->route),
                    'name' => $request->route,
                    'permission_id' => $request->permission,
                ]);

            return backToList('permission-routes');
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
            PermissionRoute::findOrFail($id)->delete();

            return backToList('permission-routes', 'Removed');
        } catch (\Exception $err) {
            return oKOrFail($err->getMessage(), 'error');
        }
    }
}
