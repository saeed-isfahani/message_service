<?php

// namespace App\Helpers;

use Illuminate\Support\Facades\Http;

function checkToken($token)
{
    $url = config('settings.services.auth_service.url');
    $response = Http::withToken($token)->get($url);
    if ($response->status() == 200) {
        return json_decode($response->body());
    }
    return [];
}
