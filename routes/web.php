<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
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

Route::get("", fn () => to_route("job.index"));
Route::get("login", fn () => to_route('auth.create'))->name("login");
Route::resource('job', JobController::class)->only(["index", "show"]);
Route::resource('auth', AuthController::class)->only(['create', 'store']);
