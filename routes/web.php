<?php

use App\Http\Controllers\ActivityController;
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

Route::resources([
    'usergroups' => UserGroupController::class,
    'activities' => ActivityController::class,
]);