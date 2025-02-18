<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\MasterPincode;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'string', 'max:10', 'unique:' . User::class],
            'address' => ['required', 'string', 'max:255'],
            'ir_code' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'pincodes' => ['required', 'string'],
            'category' => ['array', 'required'],

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'IR-Code' => $request->ir_code,
            'password' => Hash::make($request->password),
        ]);

        // Convert comma-separated pincodes to an array and remove empty spaces
        $pincodeArray = array_map('trim', explode(',', $request->pincodes));
        // Fetch valid pincode IDs from the database
        $validPincodeIds = MasterPincode::whereIn('pincodes', $pincodeArray)->pluck('id')->toArray();
        // Attach multiple pincodes to the user
        if (!empty($validPincodeIds)) {
            $user->pincodes()->attach($validPincodeIds);
        }
        //  dd($request->category);
        $user->categories()->attach($request->category);
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function importUser(Request $request)
    {
        Excel::import(new UsersImport, $request->file('file'));

        return response()->json(['success' => true]);
    } //Api for dump user creation
    public function dump(Request $request)
    {
        try {
            $file = $request->file('file');
            Excel::import(new UsersImport, $request->file('file'));

            // $emails = (new UsersImport)->collection($file)->pluck('email')->toArray();
            $emails = collect(Excel::toArray(new UsersImport, $file)[0])->pluck('email')->toArray();

            $existingUsers = User::whereIn('email', $emails)->pluck('email')->toArray();

            if (!empty($existingUsers)) {
                $error = 'The following users already exist: ' . implode(', ', $existingUsers);

                return back()->with('error', $error);
            }

            return back()->with('success', 'Data imported successfully!');
        } catch (\Maatwebsite\Excel\Exceptions\NoTypeDetectedException $e) {
            return back()->with('error', 'File type not supported!');
        } catch (\Maatwebsite\Excel\Exceptions\NoTypeDetectedException $e) {
            return back()->with('error', 'Please upload a valid CSV file!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
