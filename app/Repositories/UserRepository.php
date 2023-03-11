<?php

namespace App\Repositories;

interface UserRepository {

    public function getAllUsers();

    public function getUserTransactions(int $userId);
}
