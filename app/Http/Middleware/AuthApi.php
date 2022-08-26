<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

class AuthApi
{
    public function handle($request, Closure $next)
    {
        $passphrase = config('auth-api.passphrase');
        $whitelist_key = config('auth-api.whitelist_key');
        $api_token = $request->header('api_token');
        $decrypt = openssl_decrypt(base64_decode($api_token), 'DES-ECB', $passphrase, OPENSSL_RAW_DATA);
        $data_arr = explode('.', $decrypt);

        if (count($data_arr) > 1) {
            $token = $data_arr[0];
            $timestamp = $data_arr[1];

            $request_time = Carbon::createFromTimestamp($timestamp);
            $request_time = Carbon::now()->diffInSeconds($request_time);

            if (in_array($token, $whitelist_key) && $request_time < (60 * 5)) {
                return $next($request);
            }
        }

        return response()->json([
            "status" => false,
            "message" => "Unauthenticated",
        ], 401);
    }
}