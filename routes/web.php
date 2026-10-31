<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/',        [PageController::class, 'welcome'])->name('welcome');
Route::get('/tasks',   [PageController::class, 'tasks'])->name('tasks');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/about',   [PageController::class, 'about'])->name('about');