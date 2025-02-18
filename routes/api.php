<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\LoginController;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Route::post('/assignPincodesToProduct/{productId}', [AssignmentController::class, 'assignPincodesToProduct'])->name('assignPincodesToProduct');
Route::get('/Policy_info', [EditController::class, 'get_policies_api'])->name('policy.info')->middleware(['auth:sanctum']);
Route::get('/policy/{id}', [EditController::class, 'show_mobile_api'])->name('policy.show')->middleware(['auth:sanctum']);


//varia
Route::get('/variant/{id}', [EditController::class, 'get_variant_api'])->name('variant');

Route::post('login', [LoginController::class, 'login'])->name('login');

//import user api
Route::post('/import', [RegisteredUserController::class, 'importUser']);
