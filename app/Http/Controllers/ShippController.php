<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class ShippController extends Controller
{
    public function getRate(Request $request)
    {
        $request->validate([
            'comuna' => 'required|string',
            'products' => 'required|array',
            'products.*.weight' => 'required|numeric',
            'products.*.quantity' => 'required|integer',
        ]);

        $token = Cache::get('amplifica_token');

        if (!$token) {
            return response()->json(['error' => 'Token de autenticación expirado o no disponible'], 401);
        }

        $response = Http::withToken($token)->post(Config::get('services.amplifica.url') . '/getRate', [
            'comuna' => $request->input('comuna'),
            'products' => $request->input('products'),
        ]);

        if ($response->failed()) {
            $errorMessage = $response->json()['message'] ?? 'Error desconocido al obtener las tarifas';
            return response()->json(['error' => $errorMessage], 500);
        }

        return response()->json($response->json());
    }

    public function getRegionesConfig(Request $request)
    {

        $token = Cache::get('amplifica_token');

        if (!$token) {
            return response()->json(['error' => 'Token de autenticación expirado o no disponible'], 401);
        }

        $response = Http::withToken($token)->get(Config::get('services.amplifica.url') . '/regionalConfig');

        if ($response->failed()) {
            $errorMessage = $response->json()['message'] ?? 'Error desconocido al obtener las regiones disponibles';
            return response()->json(['error' => $errorMessage], 500);
        }

        return response()->json($response->json());
    }
}
