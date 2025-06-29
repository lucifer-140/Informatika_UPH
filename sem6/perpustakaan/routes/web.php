<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\BookBorrowController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ReportController;


Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');
Route::get('/books/{book}', [HomepageController::class, 'book'])->name('homepage.book');


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/history', [DashboardController::class, 'history'])->name('dashboard.history');


    Route::post('/books/{book}/borrow', [BookBorrowController::class, 'borrow'])->name('books.borrow');
    Route::post('/books/{book}/return', [BookBorrowController::class, 'returnBook'])->name('books.return');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::get('/loans', [AdminDashboardController::class, 'activeLoans'])->name('loans.index');
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

        Route::resource('books', BookController::class);
        Route::resource('users', UserController::class)->only(['index', 'edit', 'update']);
    });
});
