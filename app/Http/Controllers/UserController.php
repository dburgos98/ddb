<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    public function index(): View
    {
        $users = Cache::remember('users', 60 * 5, function () {
            return $this->userRepository->getAllUsers()
                ->sortByDesc('created_at');
        })->paginate();

        return view('users.index', compact('users'));
    }

    public function view(int $id): View
    {
        $userTransactions = $this->userRepository->getUserTransactions($id)
            ->paginate();

        return view('users.view', compact('userTransactions'));
    }
}
