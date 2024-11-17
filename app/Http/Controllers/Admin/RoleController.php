<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Role::whereNotIn('role', ['super_admin'])->orderBy('id', 'desc')->get();

        return view('pages.role', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:roles|max:255',
                'description' => 'nullable|max:255',
            ]);
            Role::create([
                'name' => $request->name,
                'role' => lowerAnd_($request->name),
                'description' => $request->description,
            ]);

            return oKOrFail();
        } catch (\Exception $err) {
            return okOrFail($err->getMessage(), 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Role::find($id);

        return view('forms.role.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Role::find($id);

        return view('forms.role.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|unique:roles,name,' . $id . '|max:255',
                'description' => 'nullable|max:255',
            ]);

            $check = Role::findOrFail($id);
            if (!$check) {
                return okOrFail('Not found', 'error');
            }
            $check->update([
                'name' => $validated['name'],
                'role' => lowerAnd_($validated['name']),
                'description' => $validated['description'],
            ]);

            return backToList('roles');
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
            $check = Role::find($id);
            if (!$check->users->isEmpty()) {
                return okOrFail('Cannot delete role with users assigned to it.', 'error');
            }
            // If the role exists, delete it. Otherwise, display an error message.
            elseif ($check) {
                $check->delete($id);

                return backToList('roles', 'Removed');
            } else {

                return okOrFail('Not found.', 'error');
            }
        } catch (\Exception $err) {
            return okOrFail($err->getMessage(), 'error');
        }
    }

    //delete multiple roles from the database
    public function deleteMultiple(Request $request)
    {
        try {
            // Get the IDs of the selected roles from the request data.
            $ids = $request->get('ids');
            if ($ids) {
                if (!$ids->users->isEmpty()) {
                    return okOrFail('Cannot delete role with users assigned to it.', 'error');
                }
                Role::destroy($ids);

                return backToList('roles', 'Removed');
            }

            return okOrFail('No roles selected.', 'error');
        } catch (\Exception $err) {
            return okOrFail($err->getMessage(), 'error');
        }
    }
}
