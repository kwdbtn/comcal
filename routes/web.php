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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ------------------------------------------------ Dashboard --------------------------------------------------------------------------

Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// ------------------------------------------------ Activities -------------------------------------------------------------------------

Route::get('activities', [ActivityController::class, 'index'])->name('activities.index');
// Route::get('activities/mine', [ActivityController::class, 'useractivities'])->name('activities.mine');
Route::get('activities/inbox', [ActivityController::class, 'inbox'])->name('activities.inbox');
Route::get('activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::get('activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');
Route::get('activities/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
Route::post('activities', [ActivityController::class, 'store'])->name('activities.store');
Route::put('activities/{activity}', [ActivityController::class, 'update'])->name('activities.update');
Route::get('activities/{activity}/file', [ActivityController::class, 'viewfile'])->name('activities.viewfile');

// ------------------------------------------------ Sub-Activities ----------------------------------------------------------------------

Route::get('activities/{activity}/subactivities', [SubActivityController::class, 'index'])->name('subactivities.index');
Route::get('activities/{activity}/subactivities/create', [SubActivityController::class, 'create'])->name('subactivities.create');
Route::get('activities/{activity}/subactivities/{subactivity}', [SubActivityController::class, 'show'])->name('subactivities.show');
Route::get('activities/{activity}/subactivities/{subactivity}/edit', [SubActivityController::class, 'edit'])->name('subactivities.edit');
Route::post('activities/{activity}/subactivities', [SubActivityController::class, 'store'])->name('subactivities.store');
Route::put('activities/{activity}/subactivities/{subactivity}', [SubActivityController::class, 'update'])->name('subactivities.update');

// ------------------------------------------------ Activity Actions --------------------------------------------------------------------

Route::get('activities/{activity}/actions', [ActivityActionController::class, 'index'])->name('activityactions.index');
Route::get('activities/{activity}/actions/create', [ActivityActionController::class, 'create'])->name('activityactions.create');
Route::get('activities/{activity}/actions/showdelegate', [ActivityActionController::class, 'showdelegate'])->name('activityactions.showdelegate');
Route::get('activities/{activity}/actions/{activityaction}', [ActivityActionController::class, 'show'])->name('activityactions.show');
Route::get('activities/{activity}/actions/{activityaction}/edit', [ActivityActionController::class, 'edit'])->name('activityactions.edit');
Route::post('activities/{activity}/actions', [ActivityActionController::class, 'store'])->name('activityactions.store');
Route::put('activities/{activity}/actions/{activityaction}', [ActivityActionController::class, 'update'])->name('activityactions.update');
Route::put('activities/{activity}/actions/delegate', [ActivityActionController::class, 'delegate'])->name('activityactions.delegate');

Route::resources([
    'usergroups' => UserGroupController::class,
    // 'activities' => ActivityController::class,
]);
