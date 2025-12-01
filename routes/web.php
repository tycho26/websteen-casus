<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $projectController = new ProjectController;

    return $projectController->index($isAdmin = false);
});

Route::resource('/admin/project', ProjectController::class);
