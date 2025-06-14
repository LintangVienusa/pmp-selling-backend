<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserSession;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = Str::random(60);

        UserSession::create([
            'user_id' => $user->id,
            'token' => $token,
            'expires_at' => now()->addDays(7),
        ]);

        return response()->json([
            'token' => $token,
            'user' => [
                'name' => $user->name,
                'role' => $user->role,
            ],
        ]);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        DB::table('user_sessions')->where('token', $token)->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
