<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class RefreshTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = cache('amplifica_token');

        if (!$token) {
            $username = Cache::get('username');
            $password = Cache::get('password');

            if ($username && $password) {
                $response = Http::post(Config::get('services.amplifica.url') . '/auth', [
                    'username' => $username,
                    'password' => $password,
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $newToken = $data['token'];
                    Cache::put('amplifica_token', $newToken, now()->addSeconds(55));
                } else {
                    return response()->json(['error' => 'No se pudo renovar el token.'], 401);
                }
            } else {
                return response()->json(['error' => 'Usuario no autenticado.'], 401);
            }
        }
        return $next($request);
    }
}
