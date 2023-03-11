<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

final class DDBUserRepository implements UserRepository
{
    private static string $token;

    public function __construct()
    {
        self::$token = env('TOKEN');
    }

    public function getAllUsers()
    {
        $response = Http::retry(2, 100)
        ->acceptJson()
        ->get('https://test.conectadosweb.com.co/users/'.self::$token);

        return $response->collect();
    }

    public function getuser(int $userId)
    {
        $response = Http::retry(2, 100)
        ->acceptJson()
        ->get('https://test.conectadosweb.com.co/users/'.self::$token);

    }

    public function getUserTransactions(int $userId)
    {
        $response = Http::retry(2, 100)
        ->acceptJson()
        ->get('https://test.conectadosweb.com.co/users/'.self::$token . "/transaction/$userId");

        return $response->collect();
    }
}
