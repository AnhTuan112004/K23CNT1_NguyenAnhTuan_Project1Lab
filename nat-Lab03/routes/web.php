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
Route::get('/account',[AccountController::class,'index'])->name('account.index');
Route::get('/account-create',[AccountController::class,'create'])->name('account.create');
Route::get('/account-show',[AccountController::class,'showData'])->name('account.show');
Route::get('/account-list',[AccountController::class,'list'])->name('account.list');
