<?php

use App\Livewire\Admin\Auth\ForgotPasswordPage;
use App\Livewire\Admin\Auth\LoginPage;
use App\Livewire\Admin\Auth\RegisterPage;
use App\Livewire\Admin\Auth\ResetPasswordPage;
use App\Services\Admin\GoogleLoginService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', LoginPage::class)->name('login');
Route::any('/auth/callback', GoogleLoginService::class)->name('login.google.redirect');
Route::get('/register', RegisterPage::class)->name('register');
Route::get('/forgot-password', ForgotPasswordPage::class)->name('forgot-password');
Route::get('/reset-password/{token}', ResetPasswordPage::class)->name('reset-password');
