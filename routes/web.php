<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/project/create',[ProjectController::class,'create']);
Route::post('/project/create',[ProjectController::class,'store']);
