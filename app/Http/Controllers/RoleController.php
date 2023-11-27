<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:access roles|create roles|edit roles|delete roles', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:create roles', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:edit roles', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:delete roles', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        $role = Role::create(['name' => $request->name]);

        $role->syncPermissions($request->permissions);
        toastr()->success('New role has been created!');
        return redirect()->route('roles.index');
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
    public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('roles.edit', compact('permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        toastr()->success('Role has been updated!');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        toastr()->success('Role has been deleted!');
    }
}
