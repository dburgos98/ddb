<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        private UserService $userService,
    ) {
    }

    public function index(): View
    {
        $users = $this->userService->getAllUsers()
        ->sortByDesc('created_at')
        ->paginate();

        return view('users.index', compact('users'));
    }

    public function view(int $id): View
    {
        $userTransactions = $this->userService->getUserTransactions($id)
            ->paginate();

        return view('users.view', compact('userTransactions'));
    }

    public function show(int $id): JsonResponse
    {
        $user = $this->userService->getUser($id);

        return Response::json($user);
    }
}
