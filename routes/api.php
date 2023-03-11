<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->middleware(['log.api'])->group(function() {
    Route::get('/users/{id}', [UserController::class, 'show']);
});

