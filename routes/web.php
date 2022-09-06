<?php

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

Route::resources([
    'usergroups' => UserGroupController::class,
    'activities' => ActivityController::class,
]);