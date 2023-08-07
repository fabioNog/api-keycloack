<?php

// app/Http/Middleware/KeycloakJWTMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class KeycloakJWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next0
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Obtém o token de acesso JWT do cabeçalho Authorization
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Token de acesso não fornecido.'], 401);
        }

         // Obter a chave pública do Keycloak para verificar a assinatura do token
         $keycloakPublicKeyResponse = Http::get('http://hopeful_feistel:8080/realms/my-realm/protocol/openid-connect/certs');
         $keycloakPublicKey = $keycloakPublicKeyResponse->json('keys')[0]['x5c'][0];

        try {
            // Verifica e decodifica o token JWT usando a chave pública do Keycloak
            $decodedToken = Auth::decodeToken($token, $keycloakPublicKey, ['RS256']);

            // Token é válido, permite o acesso à rota protegida
            return $next($request);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Token de acesso inválido.'], 401);
        }
    }
}
