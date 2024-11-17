<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Module::where('name', '!=', 'dashboard')->get();

        return view('pages.module', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.module.create', ['routes' => renderRoute()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'route' => 'required|string|unique:modules,name',
                'icon' => 'required|string|max:255',
                'text' => 'required|string|max:255',
            ]);
            Module::create([
                'segment' => getFirst($request->route),
                'name' => $request->route,
                'icon' => $request->icon,
                'text' => $request->text,
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
        $item = Module::find($id);

        return view('forms.module.show', ['item' => $item, 'routes' => renderRoute()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Module::find($id);

        return view('forms.module.edit', ['item' => $item, 'routes' => renderRoute()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'route' => 'required|string|unique:modules,name,' . $id,
                'icon' => 'required|string|max:255',
                'text' => 'required|string|max:255',
            ]);

            Module::findOrFail($id)->update([
                'segment' => getFirst($request->route),
                'name' => $request->route,
                'icon' => $request->icon,
                'text' => $request->text,
            ]);

            return backToList('modules');
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
            Module::destroy($id);

            return backToList('modules');
        } catch (\Exception $err) {
            return oKOrFail($err->getMessage(), 'error');
        }
    }
}
