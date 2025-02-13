<?php

use App\Http\Controllers\ControllerSchool;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[ControllerSchool::class,'index'])->name('dashboard');
