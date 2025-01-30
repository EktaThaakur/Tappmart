<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Route::post('/assignPincodesToProduct/{productId}', [AssignmentController::class, 'assignPincodesToProduct'])->name('assignPincodesToProduct');
Route::get('/Policy_info', [EditController::class, 'get_policies_api'])->name('policy.info');
Route::get('/policy/{id}', [EditController::class, 'show_mobile_api'])->name('policy.show');


//varia
Route::get('/variant/{id}', [EditController::class, 'get_variant_api'])->name('variant');
