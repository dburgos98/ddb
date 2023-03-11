<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function getAllUsers()
    {
        return Cache::remember('users', 60 * 5, function () {
            return $this->userRepository->getAllUsers();
        });
    }   

    public function getUserTransactions(int $userId)
    {
        return Cache::remember("transactions-$userId", 60 * 5, fn () => $this->userRepository->getUserTransactions($userId));
    }

    public function getUser(int $userId)
    {
        $user = $this->getAllUsers()->first(fn($u) => $u['id'] === $userId);
        $userTransactions = $this->getUserTransactions($userId);

        $user['transactions'] = $userTransactions;
        return $user;
    }
}
