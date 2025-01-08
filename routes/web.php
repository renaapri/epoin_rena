<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function (){
    Route::get('/register',[LoginRegisterController::claas,'register'])->name('register');
    Route::post('/store',[LoginRegisterController::claas,'register'])->name('store');
    Route::get('/login',[LoginRegisterController::claas,'login'])->name('login');
    Route::post('/authenticate',[LoginRegisterController::claas,])->name('authenticate');
});

Route::middleware('auth','admin')->group(function (){
    Route::post('admin/dashboard',[AdminController::class, 'index'])->name('admin/dashboard');
    Route::resource('/admin/siswa',SiswaController::class);
    Route::post('logout',[AdminController::class,'logout'])->name('logout');
});
