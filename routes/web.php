<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// ==========================================
// HOME PAGE ROUTE
// ==========================================
Route::get('/', function () {
    return view('frontend.pages.index');
});

// ==========================================
// AUTHENTICATION ROUTES (Login, Register, Logout)
// ==========================================
Route::get('/login', function () {
    return view('frontend.auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('auth.login.submit');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// OTP VERIFICATION ROUTES
// ==========================================
// OTP Form dekhabar jonno (GET)
Route::get('/verify-otp', function () {
    return view('frontend.auth.otp');
})->name('auth.otp.form');

// OTP Submit kore verify korar jonno (POST) - Ei route tai missing chilo!
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('auth.otp.submit');

// ==========================================
// FORGOT PASSWORD ROUTES (Pro OTP Logic)
// ==========================================
Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetOtp'])->name('password.email');
Route::get('/reset-password/{email}', [AuthController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'updatePassword'])->name('password.update');
// Profile Edit Route (Sudhu login kora user access pabe)
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->middleware('auth');
