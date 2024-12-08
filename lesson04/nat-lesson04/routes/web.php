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


use App\Http\Controllers\natController;
Route::get('/view1',[natController::class,'index']);

Route::get('/view-2',function()
{
    return view('view2',['name'=>'Welcome to,
    Devmaster']);
});


Route::get('/1', function () {
    return view('tesst');
});

Route::get('/view-3',function(){return view('admin.view3',['name'=>'Quản trị nội
    dung']);});
    use App\Http\Controllers\view4;
    Route::get('/view-4',[view4::class,'view4'])->name('viewdemo.view4');
    use App\Http\Controllers\view5;
    Route::get('/view-5',[view5::class,'view5'])->name('viewdemo.view5');

    Route::get('/view-6',function(){return view('view6');});