<?php

namespace App\Http\Controllers;

use App\Models\DynamicVarints;
use App\Models\FormName;
use App\Models\InputData;
use App\Models\product;
use Illuminate\Http\Request;

class DynamicController extends Controller
{

    public function dynamic_form()
    {
        $products = product::all();
        $form = FormName::where('product_id', request()->query('product'))->first();
        if ($form) {
            return view('layouts.Dynamic_Form', compact('products', 'form'));
        }
        return view('layouts.Dynamic_Form', compact('products', 'form'));
    }

    public function add_fields(Request $request, $id)
    {
        $product = product::find($id);
        $form = FormName::where('product_id', $id)->first();
        if (!$form) {
            $form = new FormName();
            $form->product_id = $id;
            $form->name = 'product-' . $product->name;
            $form->save();
        }

        $field = new InputData();
        $field->form_name_id = $form->id;
        $field->save();

        return redirect()->back();
    }

    public function create(Request $request)
    {
        // dd($request->all());
        //Name
        foreach ($request->name as $namekey => $name) {
            $nameinput = InputData::where('id', $namekey)->first();
            $nameinput->name = $name;
            $nameinput->save();
        }

        //Validation
        foreach ($request->validation as $validationKey => $valid) {
            $valueInput = InputData::where('id', $validationKey)->first();
            $valueInput->validation = $valid;
            $valueInput->save();
        }
        foreach ($request->type as $typeKey => $typeid) {
            $typevalue = InputData::where('id', $typeKey)->first();
            $typevalue->type = $typeid;
            $typevalue->save();
        }
        // foreach ($request->label as $labelKey => $labelid) {
        //     $labelvalue = InputData::where('id', $labelKey)->first();
        //     $labelvalue->label = $labelid;
        //     $labelvalue->save();
        // }

        foreach ($request->placeholder as $placeholderKey => $placeholderid) {
            $placeholdervalue = InputData::where('id', $placeholderKey)->first();
            $placeholdervalue->placeholder = $placeholderid;
            $placeholdervalue->save();
        }

        foreach ($request->value as $valueKey => $valueid) {
            $valuevalue = InputData::where('id', $valueKey)->first();
            $valuevalue->value = $valueid;
            $valuevalue->save();
        }
        foreach ($request->label as $labelKey => $labelid) {
            $labelvalue = InputData::where('id', $labelKey)->first();
            $labelvalue->label = $labelid;
            $labelvalue->save();
        }

        return redirect()->back();
    }
    public function View(Request $request, $id)
    {
        $products = product::all();
        $data = InputData::where('form_name_id', $id)->get();
        return view('layouts.Dynamic_Form_View', compact('data', 'products'));
    }
    public function delete_fields(Request $request, $id)
    {
        InputData::where('id', $id)->delete();
        return redirect()->back();
    }
    public function form_save(Request $request)
    {
        $data = $request->all();
        // Store data in the database
        DynamicVarints::create([
            'data' => json_encode($data),
        ]);

        return redirect()->back()->with('success', 'Form data saved successfully.');

        // dd($request->all());

    }
    public function form_view()
    {
        $data = DynamicVarints::all();

        // Extract unique headers from all JSON data
        $headers = [];

        foreach ($data as $response) {
            $decodedData = json_decode($response->data, true);

            // Remove unnecessary keys
            unset($decodedData['id'], $decodedData['_token']);

            // Store back cleaned data
            $response->data = $decodedData;

            // Collect all possible keys for headers
            $headers = array_merge($headers, array_keys($decodedData));
        }

        // Remove duplicate headers
        $headers = array_unique($headers);

        return view('layouts.DynamicVarints_data', compact('data', 'headers'));
    }
}
