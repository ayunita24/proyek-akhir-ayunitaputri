<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;


Route::get('/',function(){
    return view('dashboard',[
        'title'=>"Dashbord"
    ]);
});
Route::resource('karyawan', KaryawanController::class);
Route::resource('absensi', AbsensiController::class);
