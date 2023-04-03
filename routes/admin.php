<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


// Route::get('/admin', function () {
//   return "Welcome back admin";
// });
// Route::group(['namespace' => 'admin'], function () {

// });
Route::get('/admin', [AdminController::class, 'home']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/users', [AdminController::class, 'users']);

Route::get('login', function () {
  return "You must be auth to see our content";
})->name('login');