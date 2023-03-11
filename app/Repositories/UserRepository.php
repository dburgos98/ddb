<?php

namespace App\Repositories;

interface UserRepository {

    public function getAllUsers();

    public function getuser(int $userId);

    public function getUserTransactions(int $userId);
}
