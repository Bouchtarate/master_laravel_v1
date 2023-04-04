<?php

use App\Http\Controllers\front\FrontController;
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

Route::get('/', function () {
  return view('welcome');
});
Route::get('/test1/{id}', function () {
  return 'Welcome user ';
});

Route::get('/test1/{id?}', function () {
  return 'Welcome user without id';
});

Route::get('front/', [FrontController::class, 'index']);

Route::get('front/landing', [FrontController::class, 'landing']);