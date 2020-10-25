<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\RewardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Add a new reward
Route::post('reward', [RewardController::class, 'reward'])->name('reward.store');
// Add a new project
Route::post('project', [ProjectController::class, 'project'])->name('project.store');
// Update an existing project
Route::put('project', [ProjectController::class, 'updateExisting'])->name('project.updateexisting');
// Find projects by status
Route::get('project/findByStatus', [ProjectController::class, 'findByStatus'])->name('project.findbystatus');
// Find project by ID
Route::get('project/{projectId}', [ProjectController::class, 'findById'])->name('project.findbyid');
// Updates a project with form data
Route::post('project/{projectId}', [ProjectController::class, 'project']);
// Deletes a project
Route::delete('project/{projectId}', [ProjectController::class, 'destroy'])->name('project.destroy');
