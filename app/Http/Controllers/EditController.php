<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function editor()
    {
        //call product modal
        $products = product::latest()->get();
        return view('layouts.editor', compact('products'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'product' => 'required|string|max:255',
            'content' => 'required|string', // CKEditor content is usually a string
            'FAQ' => 'required|string',
            'about' => 'required|string'
        ]);

        // Create a new policy record
        Policy::create([
            'product' => $request->input('product'),
            'content' => $request->input('content'),
            'FAQ' => $request->input('FAQ'),
            'about' => $request->input('about')
        ]);


        // Redirect back with a success message
        return redirect()->back()->with('success', 'Policy saved successfully!');
    }
    public function show($id) //details of policy
    {
        $policy = Policy::find($id);
        return view('layouts.policyDetail', compact('policy'));
    }
    public function Policy_info() //only name of policy
    {
        $policies = Policy::latest()->get();
        return view('layouts.Policy_info');
    }
    public function delete($id)
    {
        $policy = Policy::find($id);
        if ($policy) {
            $policy->delete();
            return redirect()->route('policy.info')->with('success', 'Policy deleted successfully!');
        }
        return redirect()->route('policy.info')->with('error', 'Policy not found!');
    }
    public function update(Request $request, $id)
    {
        $policy = Policy::find($id);
        //update policy
        $policy->product = $request->input('product');
        $policy->content = $request->input('content');
        $policy->FAQ = $request->input('FAQ');
        $policy->about = $request->input('about');
        $policy->save();

        return redirect()->route('policy.info')->with('success', 'Policy updated successfully!');
    }
    public function edit($id)
    {
        $products = product::latest()->get();
        $policy = Policy::find($id);
        return view('layouts.Edit_Policy', compact('policy', 'products'));
    }
    //api

    // public function get_policies()
    // {
    //     $policies = Policy::latest()->get();
    //     return response()->json($policies);
    // }
    // public function show_mobile($id)
    // {
    //     $policy = Policy::find($id);
    //     return response()->json($policy);
    // }
    public function get_policies_api() //only name of policy
    {
        $policies = Policy::latest()->get();
        return response()->json($policies);
    }
    public function show_mobile_api($id) //details of policy
    {
        $policy = Policy::find($id);
        return response()->json($policy);
    }


    public function get_variant_api($id)
    {
        //check which product is selected
        $product = product::find($id);

        $product_variants = ProductVariant::where('product_id', $product->id)->get();
        return response()->json($product_variants);
    }
}
