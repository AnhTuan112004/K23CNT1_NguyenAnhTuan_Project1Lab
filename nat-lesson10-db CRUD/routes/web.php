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
use App\Http\Controllers\natNhaCCController;
Route::get('/natnhacc',[natNhaCCController::class,'natlist'])->name('natnhacc.natlist');
// detail
Route::get('/natnhacc/detail/{manhacc}',[natNhaCCController::class,'natdetail'])->name('natnhacc.natdetail');
// edit
Route::get('/natnhacc/edit/{manhacc}',[natNhaCCController::class,'natedit'])->name('natnhacc.natedit');
Route::post('/natnhacc/edit/{manhacc}',[natNhaCCController::class,'nateditsubmit'])->name('natnhacc.nateditsubmit');
// create
Route::get('/natnhacc/create', [natNhaCCController::class, 'natcreate'])->name('natnhacc.natcreate');
Route::post('/natnhacc/create', [natNhaCCController::class, 'natcreatesubmit'])->name('natnhacc.natcreatesubmit');
// delete
Route::get('natnhacc/delete/{manhacc}',[natNhaCCController::class,'natdelete'])->name('natnhacc.natdelete');