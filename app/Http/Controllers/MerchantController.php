<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function merchant_view()
    {
        $merchants = Merchant::all();
        return view('layouts.merchant', compact('merchants'));
    }
    public function merchant_new()
    {
        return view('layouts.new_merchant');
    }
    public function create_merchant(Request $request)
    {
        $merchants = new Merchant();
        $merchants->name = $request->name;
        $merchants->email = $request->email;
        $merchants->merchant_type = $request->merchant_type;
        $merchants->address = $request->address;
        $merchants->phone = $request->phone;
        $merchants->sales_code = $request->sales_code;
        $merchants->save();
        return redirect()->route('merchant_view');
    }
    public function delete_merchant($id)
    {
        $merchants = Merchant::find($id);
        $merchants->delete();
        return redirect()->route('merchant_view');
    }
    //
    public function edit_merchant($id)
    {
        $merchants = Merchant::find($id);
        return view('layouts.edit_merchantForm', compact('merchants'));
    }
    public function update_merchant(Request $request, $id)
    {
        $merchants = Merchant::find($id);
        $merchants->name = $request->name;
        $merchants->email = $request->email;
        $merchants->merchant_type = $request->merchant_type;
        $merchants->address = $request->address;
        $merchants->phone = $request->phone;
        $merchants->sales_code = $request->sales_code;
        $merchants->save();
        return redirect()->route('merchant_view');
    }
}
