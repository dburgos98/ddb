<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    public function index(): View
    {
        $users = $this->userRepository->getAllUsers()->paginate();

        return view('users.index', compact('users'));
    }

    public function view(int $id): View
    {
        $userTransactions = $this->userRepository->getUserTransactions($id);

        return view('users.view', compact('userTransactions'));
    }
}
