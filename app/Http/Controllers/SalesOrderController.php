<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;
use App\Models\SalesOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = SalesOrder::with(['customer', 'items', 'salesman']);

        if ($request->has('user_id')) {
            $query->where('salesman_id', $request->user_id);
        }

        $orders = $query->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $orders
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string',
            'remarks' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.item_code' => 'required|string',
            'items.*.item_name' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        $order = SalesOrder::create([
            'customer_id' => $validated['customer_id'],
            'salesman_id' => $validated['user_id'],
            'address' => $validated['address'],
            'remarks' => $validated['remarks'] ?? null,
        ]);

        Log::info('Creating Sales Order for user: ' . $validated['user_id']);

        foreach ($validated['items'] as $item) {
            SalesOrderItem::create([
                'sales_order_id' => $order->id,
                'item_code' => $item['item_code'],
                'item_name' => $item['item_name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'total' => $item['quantity'] * $item['price'],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Sales order created successfully',
            'data' => $order->load('items')
        ], 201);
    }

    public function show($id)
    {
        $order = SalesOrder::with(['items', 'customer', 'salesman'])->find($id);

        if (! $order) {
            return response()->json([
                'success' => false,
                'message' => 'Sales order not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $order
        ]);
    }
}
