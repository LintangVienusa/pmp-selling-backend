<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all([
            'customer_id',
            'customer_name',
            'address',
            'tax_address',
            'city',
            'phone',
            'notes'
        ]);

        return response()->json([
            'success' => true,
            'data' => $customers
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|unique:customers,customer_id',
            'customer_name' => 'required|string',
            'owner_name' => 'nullable|string',
            'top_type' => 'nullable|string',
            'transaction_limit' => 'nullable|numeric',
            'ktp_photo_url' => 'nullable|url',
            'npwp_photo_url' => 'nullable|url',
            'address' => 'required|string',
            'tax_address' => 'nullable|string',
            'city' => 'required|string',
            'phone' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $customer = Customer::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Customer created successfully',
            'data' => $customer
        ], 201);
    }
}
