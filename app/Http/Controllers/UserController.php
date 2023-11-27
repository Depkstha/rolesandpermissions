<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        $user = User::create($validatedData);
        $user->roles()->attach($request->role);
        toastr()->success('User has been created!');
        return redirect()->route('users.index');
    }

    public function index(UsersDataTable $dataTables)
    {
        return $dataTables->render('users.index');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        toastr()->success('Data has been deleted successfully!');
        return redirect()->back();
    }
}
