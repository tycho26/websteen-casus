<?php

use App\Models\Project;
use App\Models\Plot;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PlotController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $projectController = new ProjectController;

    return $projectController->index($isAdmin = false);
});

Route::get('/project/{project}', function (Project $project) {
    $projectController = new ProjectController;

    return $projectController->show($project, $isAdmin = false);
})->name('project.showUser');

Route::prefix('admin')->group(function() {
    Route::resource('/project', ProjectController::class);
    Route::resource('project.plot', PlotController::class)->except(['show','index']);
});
