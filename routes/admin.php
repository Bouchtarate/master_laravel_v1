<?php

use Illuminate\Support\Facades\Route;


// Route::get('/admin', function () {
//   return "Welcome back admin";
// });

Route::middleware('auth')->group(function () {
  Route::get('/admin', function () {
    return "Welcome Users";
  })->name('dashboard');
});