<?php

use App\Http\Controllers\Ajax\ClientController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\front\FrontController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
  return view('welcome');
});
Route::get('/test1/{id}', function () {
  return 'Welcome user ';
});

Route::get('/test1/{id?}', function () {
  return 'Welcome user without id';
});

Route::get('front/', [FrontController::class, 'index']);

Route::get('front/landing', [FrontController::class, 'landing'])->name('landing')->middleware('check.age');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//CRUD OPERATION
Route::group(['middleware' => 'auth:admin'], function () {
  Route::get('/', [CrudController::class, 'index'])->name('crud');
  Route::get('/create', [CrudController::class, 'create'])->name('crud.create');
  Route::post('/store', [CrudController::class, 'store'])->name('crud.store');
  Route::get('/edit/{id}', [CrudController::class, 'edit'])->name('crud.edit');
  Route::put('/update/{id}', [CrudController::class, 'update'])->name('crud.update');
  Route::get('/delete/{id}', [CrudController::class, 'delete'])->name('crud.delete');
});
//CRUD OPERATION
//EVENT LISTENER
Route::get('/youtube', [CrudController::class, 'youtube']);
//EVENT LISTENER


// CRUD OPERATION WITH AJAX
Route::get('/ajax', [ClientController::class, 'index']);
Route::get('/ajax/create', [ClientController::class, 'create']);
Route::post('/ajax/store', [ClientController::class, 'store'])->name('ajaxCRUD.store');
Route::get('/ajax/edit/{id}', [ClientController::class, 'edit']);
Route::post('/ajax/update', [ClientController::class, 'update'])->name('ajaxCRUD.update');
Route::post('ajax/delete', [ClientController::class, 'delete'])->name('ajaxCRUD.delete');
// CRUD OPERATION WITH AJAX