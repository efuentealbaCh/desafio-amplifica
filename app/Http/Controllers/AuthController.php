<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|email',
            'password' => 'required|string',
        ]);

        $response = Http::post(Config::get('services.amplifica.url') . '/auth', [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);
        if ($response->failed()) {
            $errorMessage = 'Credenciales incorrectas o error en la autenticación';

            $apiError = $response->json()['error'] ?? null;
            if ($apiError) {
                $errorMessage .= ' - ' . $apiError;
            }

            return response()->json(['error' => $errorMessage], 401);
        }

        $data = $response->json();
        $token = $data['token'];

        Cache::put('amplifica_token', $token, now()->addSeconds(55));
        Cache::put('username', $request->input('username'));
        Cache::put('password', $request->input('password'));

        return response()->json(['token' => $token]);
    }
}
