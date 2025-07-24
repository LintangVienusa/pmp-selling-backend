<?php

namespace App\Http\Controllers;

use App\Models\SalesRoute;
use Illuminate\Http\Request;

class SalesRouteController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $query = SalesRoute::with('customer_data')
        ->where('user_id', $user->id);

        if ($request->has('day')) {
            $query->whereRaw('LOWER(day) = ?', [strtolower($request->day)]);
        }

        $routes = $query->get()->map(function ($route) {
            return [
                'salesman_name' => $route->salesman_name,
                'customer_id'   => $route->customer_id,
                'customer_name' => $route->customer_data->name ?? $route->customer,
                'address'       => $route->address ?? $route->customer_data->address ?? null,
                'day'           => $route->day,
                'area'          => $route->area,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $routes
        ]);
    }
}
