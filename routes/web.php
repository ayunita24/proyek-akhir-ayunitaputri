<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LoginController;


Route::get('/',function(){
    return view('dashboard',[
        'title'=>"Dashbord"
    ]);
});
Route::resource('karyawan', KaryawanController::class);
Route::resource('absensi', AbsensiController::class);
Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']); 