<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = \App\Models\Customers::paginate(5);

        return view('screens.customers.index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('screens.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $this->validate($request, [

            'name' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required',
            'password' => 'required',
            'address' => 'nullable',
            'dob' => 'required|date|before:-18 years',
        ]);

        $customer = Customers::create($request->all());
        return redirect()->route('customers.index')->with('success', 'customer created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customers $customers, $id)
    {

        $customer = Customers::where('id', $id)->first();
        return view('screens.customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customers $customers, $id)
    {
        $customer = Customers::where('id', $id)->first();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->dob = $request->dob;
        $customer->save();

        return redirect()->route('customers.index')->with('warning', 'customer successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customers $customers, $id)
    {
        Customers::where('id', $id)->delete();
        return redirect()->back()->with('error', 'customer deleted successfully');
    }

    public function trashed()
    {
        $customers = \App\Models\Customers::onlyTrashed()->paginate(5);
        return view('screens.customers.restore', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function restore($id)
    {
        $customers = Customers::onlyTrashed()->where('id', $id)->first();
        $customers->deleted_at = null;
        $customers->save();
        return redirect()->back()->with('success', 'customer restore successfully');

    }
}
