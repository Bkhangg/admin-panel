<?php

use App\Http\Controllers\Auth\AdminController;
use Illuminate\Support\Facades\Route;

// Login admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Hiển thị form đăng nhập
    Route::get('login', [AdminController::class, 'showLoginForm'])->name('login');

    // Xử lý đăng nhập
    Route::post('login', [AdminController::class, 'login'])->name('login.submit');

    // Trang dashboard (chỉ vào được sau khi login)
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth:admin');

    // Đăng ký
    Route::get('register', [AdminController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AdminController::class, 'register'])->name('register.submit');

    // Đăng xuất
    Route::post('logout', [AdminController::class, 'logout'])->name('logout');
});

