<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::post('/create',[EmailController::class, 'create'])->name('create');

Route::get('/admin',function(){
    return redirect('admin/login');
});

Route::get('/admin/login',[AdminController::class, 'create'])->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'dologin'])->name('admin.dologin');

Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/logout',[AdminController::class, 'logout'])->name('admin.logout');