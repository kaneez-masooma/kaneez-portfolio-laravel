<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Website Routes
|--------------------------------------------------------------------------
| The whole portfolio is ONE scrolling page (home.blade.php). HomeController
| just gathers the data (projects, skills, etc.) and hands it to that view.
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Breeze auth routes (login/register/profile) come from this include.
| We use Breeze ONLY for the admin login — public visitors never see it.
*/

require __DIR__.'/auth.php';

require __DIR__.'/admin.php';
