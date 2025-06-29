<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->where('id', '!=', auth()->id())->paginate(10);
        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user)
    {
        if ($user->id === auth()->id()) {
            abort(403, 'You cannot edit your own roles here.');
        }

        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->id === auth()->id()) {
            abort(403, 'You cannot edit your own roles here.');
        }

        $request->validate([
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'User roles updated successfully.');
    }
}
