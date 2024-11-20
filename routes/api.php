<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();


})->middleware('auth:sanctum');



Route::get('fakultas', [FakultasController::class, 'getFakultas'])->middleware(['auth:sanctum', 'ability:read']);
Route::post('fakultas', [FakultasController::class, 'storeFakultas'])->middleware(['auth:sanctum', 'ability:create']);
Route::delete('fakultas/{id}', [FakultasController::class, 'destroyFakultas'])->middleware(['auth:sanctum', 'ability:delete']);;
Route::put('fakultas/{id}', [FakultasController::class, 'updateFakultas'])->middleware(['auth:sanctum', 'ability:update']);

Route::get('mahasiswa', [MahasiswaController::class, 'getMahasiswa']);
Route::get('mahasiswa', [MahasiswaController::class, 'storeMahasiswa']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
