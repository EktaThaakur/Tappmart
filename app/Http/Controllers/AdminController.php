<?php

namespace App\Http\Controllers;

use App\Imports\CatImport;
use App\Models\category;
use App\Models\product;
use App\Models\product_variant;
use App\Models\ProductVariant;
use App\ModelsModels\category as ModelsModelsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    //create function
    public function admin()
    {
        return view('layouts.admin');
    }
    public function category_view()
    {
        return view('layouts.Category');
    }


    public function category_data(Request $request)
    {

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'tappsure' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('/images', $imageName);
            // $validated['image'] = $imageName;
        }

        // dd($request->all());
        // dd($validated);
        $category = new category();
        $category->name = $request->name;
        $category->tappsure = $request->tappsure ? 1 : 0;
        if ($request->hasFile('image')) {

            $category->image = Storage::url('/images/' . $imageName);
        }

        $category->save();
        // $category = category::create($validated);

        return redirect()->route('category_view')
            ->with('success', 'Category created successfully!');
    }
    public function cat_bulk_data(Request $request)
    {
        // dd($request->all());
        Excel::import(new CatImport, $request->file('file'));

        return back()->with('success', 'Data imported successfully!');
    }


    public function show_data(Request $request)
    {
        $categories = category::all()->toArray();
        return view('layouts.Category', compact('categories'));
    }
    public function save_category(Request $request)
    {
        return view('layouts.save_category');
    }
    public function update_category($id)
    {
        $category = category::find($id);
        return view('layouts.updateform', compact('category'));
    }
    public function update_category_post(Request $request, $id)
    {
        $category = category::find($id);
        // dd($category);
        $category->name = $request->name;
        $category->tappsure = $request->tappsure ? 1 : 0;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('/images', $imageName);
            $category->image = Storage::url('/images/' . $imageName);
        }
        $category->save();
        return redirect()->route('category_view')
            ->with('success', 'Category updated successfully!');
    }
    public function delete_category($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect()->route('category_view')
            ->with('success', 'Category deleted successfully!');
    }

    public function create_product(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'tappoint_percentage' => 'nullable|numeric',
        ]);

        $products = new product();
        $products->name = $request->name;
        $products->description = $request->description;
        $products->tappoint_percentage = $request->tappoint_percentage;
        //category_id from category table
        $products->category_id = $request->category;
        // dd($products);
        $products->save();
        // dd($products);
        return redirect()->route('product_view')
            ->with('success', 'Product created successfully!');
    }
    public function product_new()
    {
        $categories = category::latest()->get();
        return view('layouts.product_new', compact('categories'));
    }
    public function product_view()
    {
        $products = product::all();
        // dd($products);
        return view('layouts.Products', compact('products'));
    }
    public function delete_product($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect()->route('product_view')
            ->with('success', 'Product deleted successfully!');
    }
    public function edit_product($id)
    {
        $product = product::find($id);
        $categories = category::latest()->get();
        return view('layouts.edit_productForm', compact('product', 'categories'));
    } 
    public function update_product(Request $request, $id)
    {
        // dd($request->description);
        $product = product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->tappoint_percentage = $request->tappoint_percentage;
        $product->save();
        return redirect()->route('product_view')
            ->with('success', 'Product updated successfully!');
    }
    public function product_variant_view()

    {
        // $products = product::all();
        $product_variants = ProductVariant::all();
        // dd($product_variants);
        return view('layouts.ProductVariant', compact('product_variants'));
    }
    public function create_product_variant(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'nullable|string|required',
            'premium' => 'nullable|integer|required',
            'commission' => 'nullable|integer|required',
            'suminsured' => 'nullable|integer|required',
            'grosspremium' => 'nullable|integer|required',
            'moneyinsafe' => 'nullable|integer|required',
            'neonsign' => 'nullable|integer|required',
            'totalcontent' => 'nullable|integer|required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $product_variants = new ProductVariant();

        $product_variants->name = $request->name;
        $product_variants->premium = $request->premium;
        $product_variants->commission = $request->commission;
        $product_variants->suminsured = $request->suminsured;
        $product_variants->grosspremium = $request->grosspremium;
        $product_variants->moneyinsafe = $request->moneyinsafe;
        $product_variants->neonsign = $request->neonsign;
        $product_variants->totalcontent = $request->totalcontent;
        $product_variants->product_id = $request->product;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('/images', $imageName);
            $product_variants->image = Storage::url('/images/' . $imageName);
        }



        // dd($product_variants);
        $product_variants->save();


        return redirect()->route('product_variant_view')
            ->with('success', 'Product Variant created successfully!');
    }



    public function product_variant_new()
    {
        $products = product::latest()->get();
        // $products = product::all();
        return view('layouts.ProductVariant_Form', compact('products'));
    }
    public function delete_product_variant($id)
    {
        $product_variant = ProductVariant::find($id);
        $product_variant->delete();
        return redirect()->route('product_variant_view')
            ->with('success', 'Product Variant deleted successfully!');
    }
    public function edit_product_variant($id)
    {
        $product_variant = ProductVariant::find($id);
        $products = product::latest()->get();
        return view('layouts.product_variant_update', compact('product_variant', 'products'));
    }
    public function update_product_variant(Request $request, $id)
    {
        // dd($request->description);
        $product_variant = ProductVariant::find($id);
        $product_variant->name = $request->name;
        $product_variant->premium = $request->premium;
        $product_variant->commission = $request->commission;
        $product_variant->suminsured = $request->suminsured;
        $product_variant->grosspremium = $request->grosspremium;
        $product_variant->moneyinsafe = $request->moneyinsafe;
        $product_variant->neonsign = $request->neonsign;
        $product_variant->totalcontent = $request->totalcontent;
        $product_variant->product_id = $request->product;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs('/images', $imageName);
            $product_variant->image = Storage::url('/images/' . $imageName);
        }
        $product_variant->save();
        return redirect()->route('product_variant_view')
            ->with('success', 'Product Variant updated successfully!');
    }
}
