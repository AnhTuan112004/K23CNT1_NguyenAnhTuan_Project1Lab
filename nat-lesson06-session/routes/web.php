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
    use App\Http\Controllers\natSessincontroller;
Route::get('/nat-session/get', [natSessincontroller::class,'natgetSessionData'])->name('natsession.get');
Route::get('/nat-session/set', [natSessincontroller::class,'natstoreSessionData'])->name('natsession.set');
Route::get('/nat-session/delete', [natSessincontroller::class,'natdeleteSessionData'])->name('natsession.delete');
use App\Http\Controllers\natAccountController;
Route::get('/nat-login',[natAccountController::class,'natLogin'])->name('nataccount.natlogin');
Route::get('/nat-logout',[natAccountController::class,'natdeleteSessionData'])->name('nataccount.natlogout');
Route::post('/nat-login',[natAccountController::class,'natLoginSubmit'])->name('nataccount.natloginsubmit');

