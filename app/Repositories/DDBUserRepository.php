<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

final class DDBUserRepository implements UserRepository
{
    private static string $baseURL;

    private static string $token;

    public function __construct()
    {
        self::$baseURL = 'https://test.conectadosweb.com.co';
        self::$token = env('TOKEN');
    }

    public function getAllUsers()
    {
        $response = Http::retry(2, 100)
        ->acceptJson()
        ->get(self::$baseURL.'/users/'.self::$token);

        return $response->collect();
    }

    public function getUserTransactions(int $userId)
    {
        $response = Http::retry(2, 100)
        ->acceptJson()
        ->get(self::$baseURL.'/users/'.self::$token."/transaction/$userId");

        return $response->collect();
    }
}
