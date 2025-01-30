<?php

namespace App\Http\Controllers;

use App\Models\SalesPerson;
use Illuminate\Http\Request;

class SalesPersonController extends Controller
{

    public function sales_person()
    {
        $sales_persons = SalesPerson::all();
        // dd($sales_persons);
        return view('layouts.sales_person', compact('sales_persons')); //
    }

    public function new_sales_person()
    {

        return view('layouts.new_sales_person'); //
    }
    public function create_sales_person(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'imployee_id' => 'required',
            'city' => 'required',
            'state' => 'required',
            'password' => 'required |min:8',
        ]);
        $sales_person = new SalesPerson();
        $sales_person->name = $request->name;
        $sales_person->email = $request->email;
        $sales_person->imployee_id = $request->imployee_id;
        $sales_person->city = $request->city;
        $sales_person->state = $request->state;
        $sales_person->password = $request->password;

        $sales_person->save();
        return redirect()->route('sales_person'); //


    }
    public function delete_sales_person($id)
    {
        $sales_person = SalesPerson::find($id);
        $sales_person->delete();
        return redirect()->route('sales_person');
    }
    public function update_sales_person(Request $request, $id)
    {
        $sales_person = SalesPerson::find($id);
        $sales_person->name = $request->name;
        $sales_person->email = $request->email;
        $sales_person->imployee_id = $request->imployee_id;
        $sales_person->city = $request->city;
        $sales_person->state = $request->state;
        $sales_person->password = $request->password;
        $sales_person->save();
        return redirect()->route('sales_person');
    }
    public  function edit_sales_person($id)
    {
        $sales_person = SalesPerson::find($id);
        return view('layouts.edit_sales_person', compact('sales_person'));
    }
}
