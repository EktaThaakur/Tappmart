<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function admin_user_view()
    {
        $admin_users = User::all();
        return view('layouts.admin_user', compact('admin_users'));
    }
    public function admin_user_new()
    {
        return view('layouts.new_admin_user');
    }

    // Note: Register user in "RegisteredUserController" Function name= store.

    // public function create_admin_user(Request $request)
    // {
    //     $validate = $request->validate([
    //         'email' => 'required|email|unique:admin_users',
    //         'password' => 'required|min:8',
    //     ]);
    //     $admin_user = new AdminUser();
    //     $admin_user->email = $request->email;
    //     $admin_user->password = $request->password;
    //     $admin_user->save();

    //     return redirect()->route('admin_user_view');
    // }

    public function delete_admin_user($id)
    {
        $admin_user = User::findOrFail($id);
        $admin_user->delete();

        return redirect()->route('admin_user_view');
    }
    public function edit_admin_user($id)
    {
        $admin_user = User::findOrFail($id);
        return view('layouts.edit_admin_user', compact('admin_user'));
    }
    public function update_admin_user(Request $request, $id)
    {
        $admin_user = User::findOrFail($id);
        $admin_user->email = $request->email;
        $admin_user->password = $request->password;
        $admin_user->save();

        return redirect()->route('admin_user_view');
    }
}
