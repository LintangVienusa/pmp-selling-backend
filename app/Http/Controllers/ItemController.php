<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name'        => 'required|string',
            'item_group'       => 'required|string',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'photo_url'   => 'nullable|url',
        ]);

        $item = Item::create($validated);

        return response()->json($item, 201);
    }

    public function show(Item $item)
    {
        return $item;
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'item_name'        => 'sometimes|string',
            'item_group'       => 'sometimes|string',
            'description' => 'nullable|string',
            'price'       => 'sometimes|numeric',
            'stock'       => 'sometimes|integer',
            'photo_url'   => 'nullable|url',
        ]);

        $item->update($validated);

        return $item;
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return response()->json(['message' => 'Item deleted']);
    }
}
