<?php

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


//Auth::routes();
Route::get("login",[\App\Http\Controllers\Auth\LoginController::class,"showLoginForm"])->name("login");
Route::post("login",[\App\Http\Controllers\Auth\LoginController::class,"login"])->name("login");
Route::post("logout",[\App\Http\Controllers\Auth\LoginController::class,"logout"])->name("logout");

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
    Route::resource('sessionactivity', \App\Http\Controllers\Admin\SessionActivityController::class)->names([
        "index" => "admin.sessionactivity.index",
        "create"    => "admin.sessionactivity.create",
        "edit"    => "admin.sessionactivity.edit",
        "store"    => "admin.sessionactivity.store",
        "update"    => "admin.sessionactivity.update",
        "destroy"    => "admin.sessionactivity.delete",
    ]);
    Route::resource('participant', \App\Http\Controllers\Admin\ParticipantController::class)->names([
        "index" => "admin.participant.index",
        "create"    => "admin.participant.create",
        "edit"    => "admin.participant.edit",
        "store"    => "admin.participant.store",
        "update"    => "admin.participant.update",
        "destroy"    => "admin.participant.delete",
    ]);
});

Route::get('/', [\App\Http\Controllers\WelcomeController::class,"index"]);
Route::get('/{key}', [\App\Http\Controllers\WelcomeController::class,"index"]);



