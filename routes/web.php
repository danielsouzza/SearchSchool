<?php

use App\Http\Controllers\ControllerSchool;
use Illuminate\Support\Facades\Route;


Route::get('/',[ControllerSchool::class,'index'])->name('home');
