<?php

use App\Http\Controllers\ActivityActionController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SubActivityController;
use App\Http\Controllers\UserGroupController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();

Route::get('/', [App\Http\Controllers\ActivityController::class, 'index'])->name('home');

Route::get('activities/{activity}/subactivities', [SubActivityController::class, 'index'])->name('subactivities.index');
Route::get('activities/{activity}/subactivities/create', [SubActivityController::class, 'create'])->name('subactivities.create');
Route::get('activities/{activity}/subactivities/{subactivity}', [SubActivityController::class, 'show'])->name('subactivities.show');
Route::get('activities/{activity}/subactivities/{subactivity}/edit', [SubActivityController::class, 'edit'])->name('subactivities.edit');
Route::post('activities/{activity}/subactivities', [SubActivityController::class, 'store'])->name('subactivities.store');
Route::put('activities/{activity}/subactivities/{subactivity}', [SubActivityController::class, 'update'])->name('subactivities.update');

Route::get('activities/{activity}/actions', [ActivityActionController::class, 'index'])->name('activityactions.index');
Route::get('activities/{activity}/actions/create', [ActivityActionController::class, 'create'])->name('activityactions.create');
Route::get('activities/{activity}/actions/{activityaction}', [ActivityActionController::class, 'show'])->name('activityactions.show');
Route::get('activities/{activity}/actions/{activityaction}/edit', [ActivityActionController::class, 'edit'])->name('activityactions.edit');
Route::post('activities/{activity}/actions', [ActivityActionController::class, 'store'])->name('activityactions.store');
Route::put('activities/{activity}/actions/{activityaction}', [ActivityActionController::class, 'update'])->name('activityactions.update');

Route::resources([
    'usergroups' => UserGroupController::class,
    'activities' => ActivityController::class,
]);