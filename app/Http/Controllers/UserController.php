<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $collection = Cache::remember('users', 60 * 5, function () {
            $token = env('TOKEN');
            $response = Http::retry(2, 100)
            ->acceptJson()
            ->get("https://test.conectadosweb.com.co/users/$token");

            return $response->collect();
        });

        $users = $collection
            ->paginate();

        return view('users.index', compact('users'));
    }

    public function view(int $id): View
    {
        return view('users.view');
    }
}
