<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use App\Models\category;
use App\Models\MasterPincode;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AdminUserController extends Controller
{
    public function admin_user_view()
    {
        $admin_users = User::latest()->get();
        return view('layouts.admin_user', compact('admin_users'));
    }
    public function admin_user_new()
    {
        $categories = category::latest()->get();
        return view('layouts.new_admin_user', compact('categories'));
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
        $categories = category::latest()->get();
        $admin_user = User::findOrFail($id);
        return view('layouts.edit_admin_user', compact('admin_user'), compact('categories'));
    }
    public function update_admin_user(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'IR-Code' => $request->ir_code,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);

        // Convert comma-separated pincodes to an array and remove empty spaces
        $pincodeArray = array_map('trim', explode(',', $request->pincodes));
        // Fetch valid pincode IDs from the database
        $validPincodeIds = MasterPincode::whereIn('pincodes', $pincodeArray)->pluck('id')->toArray();
        // Sync pincodes with the user
        $user->pincodes()->sync($validPincodeIds);

        // Sync categories with the user
        $user->categories()->sync($request->category);

        return redirect()->route('admin_user_view');
    }
}
