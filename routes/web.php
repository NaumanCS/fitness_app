<?php

use App\Http\Controllers\ActiveStateController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\IntensityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

    // Goals Crud
    Route::get('/goals/list', [GoalsController::class, 'index'])->name('goals.index');
    Route::get('/goal/create/{id}', [GoalsController::class, 'create'])->name('goals.create');
    Route::post('/goal/submit/{id}', [GoalsController::class, 'submit'])->name('goals.submit');
    Route::post('/goals/delete', [GoalsController::class, 'delete'])->name('goals.index');

    // Diet Crud
    Route::get('/diet', [DietController::class, 'index'])->name('diet.index');

    // Intensity Crud
    Route::get('/intensity', [IntensityController::class, 'index'])->name('intensity.index');

    // Active State Crud
    Route::get('/active-state', [ActiveStateController::class, 'index'])->name('active.state.index');
});
