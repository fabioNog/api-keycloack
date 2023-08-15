<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\HttpClientException;

class KeycloakJWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        $client = Http::withOptions([
            'curl' => [
                CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            ],
        ]);

        // Fazer a solicitação para obter o token do Keycloak
        $clientId = env('KEYCLOAK_CLIENT_ID');
        $clientSecret = env('KEYCLOAK_CLIENT_SECRET');
        $grantType = env('KEYCLOAK_GRANT_TYPE');
        $username = env('KEYCLOAK_USERNAME');
        $password = env('KEYCLOAK_PASSWORD');
        $tokenUrl = env('KEYCLOAK_TOKEN_URL');
    
        // Fazer a solicitação para obter o token do Keycloak
        $response = $client->asForm()->post($tokenUrl, [
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => $grantType,
            'username' => $username,
            'password' => $password,
        ]);

        // Verificar se a solicitação foi bem-sucedida e obter o token
        if ($response->successful()) {
            $tokenData = $response->json();
            $token = $tokenData['access_token'];

            // Definir o token no cabeçalho Authorization para solicitações subsequentes
            $request->headers->set('Authorization', 'Bearer ' . $token);

            // Continuar com a próxima camada de middleware ou rota
            return $next($request);
        } else {
            return response()->json(['message' => 'Erro ao obter o token do Keycloak.'], 401);
        }
    }
}
