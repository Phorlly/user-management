<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Permission::orderBy('id', 'desc')->get();

        return view('pages.permission', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:permissions|max:255',
                'description' => 'nullable|max:255',
            ]);
            Permission::create([
                'name' => $request->name,
                'permission' => lowerAnd_($request->name),
                'description' => $request->description,
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
        $item = Permission::find($id);

        return view('forms.permission.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Permission::find($id);

        return view('forms.permission.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|unique:permissions,name,' . $id . '|max:255',
                'description' => 'nullable|max:255',
            ]);

            $check = Permission::findOrFail($id);
            if (!$check) {
                return oKOrFail('Not found', 'error');
            }
            $check->update([
                'name' => $validated['name'],
                'permission' => lowerAnd_($validated['name']),
                'description' => $validated['description'],
            ]);

            return backToList('permissions');
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
            $check = Permission::find($id);
            if ($check) {
                $check->delete($id);

                return backToList('permissions', 'Removed');
            }

            return oKOrFail('Not found', 'error');
        } catch (\Exception $err) {
            return oKOrFail($err->getMessage(), 'error');
        }
    }
}
