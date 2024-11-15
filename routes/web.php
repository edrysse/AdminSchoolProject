<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\DashboardController;

// مسار الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
});

// مسار عرض نموذج تسجيل الدخول باستخدام GET
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// مسار إرسال بيانات تسجيل الدخول باستخدام POST
Route::post('/login', [AuthController::class, 'login']);

// مسار تسجيل الخروج باستخدام POST
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// مسار عرض نموذج التسجيل باستخدام GET
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// مسار إرسال بيانات التسجيل باستخدام POST
Route::post('/register', [AuthController::class, 'register']);

// مسار الداشبورد المحمي
Route::middleware(['auth:sanctum'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

