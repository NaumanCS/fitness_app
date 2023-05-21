<?php

use App\Http\Controllers\Api\AdminSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'register']);

// Admin Settings
Route::get('/admin/settings', [AdminSettings::class, 'get_admin_settings']);
Route::get('/all/intensities', [AdminSettings::class, 'get_intensities']);
Route::get('/all/goals', [AdminSettings::class, 'get_goals']);
Route::get('/all/diets', [AdminSettings::class, 'get_diets']);
Route::get('/all/active-states', [AdminSettings::class, 'get_active_states']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/change/password', [AuthController::class, 'changePassword']);
    Route::post('/update/profile', [UserController::class, 'update_profile']);
    Route::post('update/profile/picture', [UserController::class, 'update_profile_picture']);
    Route::get('/user/profile', [UserController::class, 'get_user_profile']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
