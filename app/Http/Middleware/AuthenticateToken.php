<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserSession;
use Carbon\Carbon;

class AuthenticateToken
{
    public function handle(Request $request, Closure $next)
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return response()->json(['message' => 'Authorization token required'], 401);
        }

        $token = substr($authHeader, 7); // hapus "Bearer "

        $userToken = UserSession::where('token', $token)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$userToken) {
            return response()->json(['message' => 'Invalid or expired token'], 401);
        }

        $request->setUserResolver(fn () => $userToken->user);

        return $next($request);
    }
}
