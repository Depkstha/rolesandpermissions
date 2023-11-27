<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:access permissions|create permissions|edit permissions|delete permissions', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:create permissions', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:edit permissions', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:delete permissions', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = Permission::latest()->get();

        return view('permissions.index', ['permissions' => $permission]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $permission = Permission::create(['name' => $request->name]);
        toastr()->success('Permission has been created!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', ['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $permission->update(['name' => $request->name]);
        toastr()->success('Permission has been updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        toastr()->success('Permission has been deleted!');
        return redirect()->back();
    }
}
