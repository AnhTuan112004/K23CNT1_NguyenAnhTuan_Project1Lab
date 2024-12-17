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

use App\Http\Controllers\NatKhoaController;
Route::get('/khoas',[NatKhoaController::class,'natGetAllKhoa'])->name('natkhoa.natgetallkhoa');
Route::get('/khoas/detail/{natmakh}',
[NatKhoaController::class,'natGetKhoa'])->name('natkhoa.natgetKhoa');

Route::get('/khoas/edit/{natmakh}',
[NatKhoaController::class,'natEdit'])->name('natkhoa.natEdit');

Route::post('/khoas/edit',
[NatKhoaController::class,'natEditSubmit'])->name('natkhoa.natEditSubmit');

Route::get('/khoas/create',[NatKhoaController::class,'natcreate'])->name('natkhoa.natcreate');
Route::post('/khoa/create',[NatKhoaController::class,'natcreateSubmit'])->name('natkhoa.natcreateSubmit');

Route::get('/khoas/delete/{natmakh}',
[NatKhoaController::class,'natDelete'])->name('natkhoa.natDelete');

Route::post('/khoas/delete',
[NatKhoaController::class,'natDeleteSubmit'])->name('natkhoa.natDeleteSubmit');