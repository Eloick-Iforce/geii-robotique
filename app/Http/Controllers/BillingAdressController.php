<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use Illuminate\Http\Request;

class BillingAdressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('billingadress.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->merge(['user_id' => auth()->user()->id]);


        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'zip_code' => 'required|string',
            'lastname' => 'required|string',
            'etablisement' => 'required|string',
            'user_id' => 'required|integer',
        ]);



        BillingAddress::create($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Billing Address created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BillingAddress $billingAddress)
    {

        return view('billingadress.edit', ['billingadress' => $billingAddress]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BillingAddress $billingAddress)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'zip_code' => 'required|string',
            'lastname' => 'required|string',
            'etablisement' => 'required|string',
            'id' => 'required|integer',
        ]);

        $billingAddress = BillingAddress::find($request->id);


        $billingAddress->update($request->all());

        return redirect()->route('dashboard')
            ->with('success', 'Votre adresse de facturation a bien été modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = $request->all();
        $billingAddress = BillingAddress::find($data['id_billing']);

        $billingAddress->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Adresse de facturation supprimée avec succès.');
    }
}
