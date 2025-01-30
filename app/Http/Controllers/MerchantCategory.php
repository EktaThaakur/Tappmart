<?php

namespace App\Http\Controllers;

use App\Models\MerchantCategory as ModelsMerchantCategory;
use App\Models\product;
use Illuminate\Http\Request;

class MerchantCategory extends Controller
{
    public function merchant_category()
    {
        $merchant_cat = ModelsMerchantCategory::paginate(50);
        return view('layouts.Merchant_category', compact('merchant_cat'));
    }
    public function merchant_category_new()
    {
        $products = product::latest()->get();
        return view('layouts.Merchant_category_new', compact('products'));
    }
    public function create_merchant_category(Request $request)
    {
        $request->validate([
            'merchant_category' => 'required|unique:merchant_categories,merchant_category',  //|exists:merchant_categories(table name),merchant_category(column name)
            'product' => 'required|exists:products,id',
        ]);
        $merchant_cat = new ModelsMerchantCategory();
        $merchant_cat->merchant_category = $request->input('merchant_category');
        $merchant_cat->save();
        $merchant_cat->products()->attach($request->input('product'));
        return redirect()->route('merchant_category');
    }
    //
}
