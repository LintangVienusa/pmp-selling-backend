<?php

namespace App\Http\Controllers;

use App\Models\SalesRoute;
use Illuminate\Http\Request;

class SalesRouteController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $query = SalesRoute::where('user_id', $user->id);

        // Optional filter by day
        if ($request->has('day')) {
            $query->whereRaw('LOWER(day) = ?', [strtolower($request->day)]);
        }

        $routes = $query->get([
            'salesman_name',
            'customer',
            'day',
            'area'
        ]);

        return response()->json([
            'success' => true,
            'data' => $routes
        ]);
    }
}
