<?php

use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');

    // leave
    Route::get("leave", [LeaveController::class, 'index'])->name('leave.index');
});

require __DIR__ . '/settings.php';
