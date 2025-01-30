<?php

namespace App\Http\Controllers;

use App\Models\MasterPincode;
use App\Models\Pincode_Product;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\User;
use App\Models\user_product;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class   AssignmentController extends Controller
{
    public function assignPincodesToProduct(Request $request)
    {

        $product = product::findOrFail($request->product_id);
        $pincodeIdsArray = explode(',', $request->pincode);
        // dd($request->all());
        foreach ($pincodeIdsArray as $pincode) {
            // dd($pincode);
            $p = MasterPincode::where('pincodes', $pincode)->first();
            // dd($p);
            if ($p) {
                Pincode_Product::create([
                    'product_id' => $product->id,
                    'pincode_id' => $p->id,
                ]);
            }
        }
        return redirect()->route('assign_pincode_to_product')
            ->with('success', 'Pincodes assigned successfully!');
    }
    public function assignProductToUser(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'pincode' => 'required|array',
        ]);

        user_product::create([
            'product_id' => $validatedData['product_id'],
            'user_id' => $validatedData['user_id'],
            'pincode' => $validatedData['pincode'],
        ]);

        return redirect()->route('user_assignment')
            ->with('success', 'Product assigned successfully!');
    }

    // public function assignProductToUser(Request $request)
    // {
    //     $user = User::findOrFail(FacadesAuth::user()->id);
    //     $product = Product::findOrFail($request->product_id);
    //     user_product::create([
    //         'product_id' => $product->id,
    //         'user_id' => $user->id
    //     ]);
    //     return redirect()->route('user_assignment')
    //         ->with('success', 'Pincodes assigned successfully!');
    // }

    public function user_assignment()
    {

        $users = User::latest()->get();
        $products = product::latest()->get();
        return view('layouts.user_assignment', compact('users', 'products'));
    }

    public function assign_pincode_to_product()
    {

        $assigned_pincodes = Pincode_Product::latest('id')->get();

        return view('layouts.assign_pincode_to_product', compact('assigned_pincodes'));
    }
    public function product_assignment()
    {
        $products = product::latest()->get();
        return view('layouts.ProductAssignment', compact('products'));
    }
    public function pincode_view()
    {
        $pincodes = MasterPincode::latest()->paginate(10);
        return view('layouts.pincode_view', compact('pincodes'));
    }
    public function create_pincode(Request $request)
    {
        // dd($request->all());
        $pcodes = explode(',', str_replace(' ', '', $request->pincode));

        foreach ($pcodes as $pcode) {
            $pincodes = new MasterPincode();
            $pincodes->pincodes = $pcode;
            $pincodes->save();
        }


        return redirect()->route('pincode_view')
            ->with('success', 'Pincode created successfully!');
    }
    public function add_pincode()
    {

        return view('layouts.add_pincode');
    }
    public function delete_pincode($id)
    {

        $pincodes = MasterPincode::find($id);
        $pincodes->delete();
        return redirect()->route('pincode_view');
    }
    public function update_pincode(Request $request, $id)
    {
        //expend
        $pcodes = explode(',', str_replace(' ', '', $request->pincode));

        foreach ($pcodes as $pcode) {
            $pincodes = MasterPincode::find($id);
            $pincodes->pincodes = $pcode;
            $pincodes->save();
        }
        return redirect()->route('pincode_view');
    }
    public function edit_pincode($id)
    {
        $pincodes = MasterPincode::find($id);
        return view('layouts.update_pincode', compact('pincodes'));
    }
    //
    public function example()
    {
        return view('layouts.example2');
    }
}
