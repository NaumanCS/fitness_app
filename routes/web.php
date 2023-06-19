<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ActiveStateController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DietController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\GeneralSettingsController;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\IntensityController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\UserController;
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

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('user.index');

    // Goals Crud
    Route::get('/goal/list', [GoalsController::class, 'index'])->name('goals.index');
    Route::get('/goal/create/{id}', [GoalsController::class, 'create'])->name('goals.create');
    Route::post('/goal/submit/{id}', [GoalsController::class, 'submit'])->name('goals.submit');
    Route::post('/goal/delete', [GoalsController::class, 'delete'])->name('goals.delete');

    // Diet Crud
    Route::get('/diet/list', [DietController::class, 'index'])->name('diet.index');
    Route::get('/diet/create/{id}', [DietController::class, 'create'])->name('diet.create');
    Route::post('/diet/submit/{id}', [DietController::class, 'submit'])->name('diet.submit');
    Route::post('/diet/delete', [DietController::class, 'delete'])->name('diet.delete');

    // Intensity Crud
    Route::get('/intensity/list', [IntensityController::class, 'index'])->name('intensity.index');
    Route::get('/intensity/create/{id}', [IntensityController::class, 'create'])->name('intensity.create');
    Route::post('/intensity/submit/{id}', [IntensityController::class, 'submit'])->name('intensity.submit');
    Route::post('/intensity/delete', [IntensityController::class, 'delete'])->name('intensity.delete');

    // Active State Crud
    Route::get('/active-state/list', [ActiveStateController::class, 'index'])->name('active.state.index');
    Route::get('/active-state/create/{id}', [ActiveStateController::class, 'create'])->name('active.state.create');
    Route::post('/active-state/submit/{id}', [ActiveStateController::class, 'submit'])->name('active.state.submit');
    Route::post('/active-state/delete', [ActiveStateController::class, 'delete'])->name('active.state.delete');

    // Food Crud
    Route::get('/food/list', [FoodController::class, 'index'])->name('food.index');
    Route::get('/food/create/{id}', [FoodController::class, 'create'])->name('food.create');
    Route::post('/food/submit/{id}', [FoodController::class, 'submit'])->name('food.submit');
    Route::post('/food/delete', [FoodController::class, 'delete'])->name('food.delete');

    // General Setting Crud
    Route::get('/general/settings', [GeneralSettingsController::class, 'create'])->name('general.settings.create');
    Route::post('/general/settings/submit', [GeneralSettingsController::class, 'submit'])->name('general.settings.submit');

    // Dropify
    Route::post('/general/settings/delete_dropify_image', [GeneralSettingsController::class, 'delete_dropify_image'])->name('delete.dropify.image');

    // About Us Crud
    Route::get('/about-us/list', [AboutUsController::class, 'index'])->name('about.index');
    Route::get('/about-us/create/{id}', [AboutUsController::class, 'create'])->name('about.create');
    Route::post('/about-us/submit/{id}', [AboutUsController::class, 'submit'])->name('about.submit');
    Route::post('/about-us/delete', [AboutUsController::class, 'delete'])->name('about.delete');

    // Policies Crud
    Route::get('/policy/list', [PolicyController::class, 'index'])->name('policy.index');
    Route::get('/policy/create/{id}', [PolicyController::class, 'create'])->name('policy.create');
    Route::post('/policy/submit/{id}', [PolicyController::class, 'submit'])->name('policy.submit');
    Route::post('/policy/delete', [PolicyController::class, 'delete'])->name('policy.delete');

    // Faq Crud
    Route::get('/faq/list', [FaqController::class, 'index'])->name('faq.index');
    Route::get('/faq/create/{id}', [FaqController::class, 'create'])->name('faq.create');
    Route::post('/faq/submit/{id}', [FaqController::class, 'submit'])->name('faq.submit');
    Route::post('/faq/delete', [FaqController::class, 'delete'])->name('faq.delete');

});
