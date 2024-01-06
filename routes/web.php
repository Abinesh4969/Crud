<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('customers', App\Http\Controllers\CustomersController::class);

Route::get('customer/trashed', [App\Http\Controllers\CustomersController::class, 'trashed']);
Route::put('customer/restore/{id}', [App\Http\Controllers\CustomersController::class, 'restore']);
