<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollaboratorController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

    Route::post('login', [AuthController::class,'login']);
    Route::get('logout', [AuthController::class,'logout']);
    Route::get('refresh', [AuthController::class,'refresh']);
    Route::get('me', [AuthController::class,'me']);

});

Route::group(['middleware' => 'api', 'prefix' => 'account', 'namespace' => 'App\Http\Controllers'], function ($router) {

    Route::post('create', [AccountController::class, 'create']);
    Route::get('get/collaborators', [AccountController::class, 'getCollaborators']);
    Route::get('get/{email}', [AccountController::class, 'getAccount']);

});

Route::group(['middleware' => 'api', 'prefix' => 'project', 'namespace' => 'App\Http\Controllers'], function ($router) {

    Route::post('create', [ProjectController::class, 'create']);
    Route::get('get/all', [ProjectController::class, 'getAll']);
    Route::get('get/{id}', [ProjectController::class, 'get']);
    Route::post('update', [ProjectController::class, 'update']);
    Route::post('links/update', [ProjectController::class, 'linksUpdate']);
    Route::post('logo/update', [ProjectController::class, 'logoUpdate']);

});

Route::group(['middleware' => 'api', 'prefix' => 'collaborator', 'namespace' => 'App\Http\Controllers'], function ($router) {

    Route::delete('delete/{id}', [CollaboratorController::class, 'deleteCollaborator']);
    Route::get('get/{id}', [CollaboratorController::class, 'getCollaborators']);
    Route::get('get/available/{id}', [CollaboratorController::class, 'getAvailableCollaborators']);
    Route::post('add', [CollaboratorController::class, 'addCollaborator']);

});

Route::group(['middleware' => 'api', 'prefix' => 'notification', 'namespace' => 'App\Http\Controllers'], function ($router) {

    Route::get('get/{id}', [NotificationController::class, 'getNotifications']);
    Route::get('get/all/{id}', [NotificationController::class, 'getAllNotifications']);

});
