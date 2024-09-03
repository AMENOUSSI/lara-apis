<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login',[\App\Http\Controllers\AuthController::class,'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('/students',[\App\Http\Controllers\StudentController::class,'index'])->name('students');
Route::post('/students',[\App\Http\Controllers\StudentController::class,'store']);
Route::get('/students/{student}',[\App\Http\Controllers\StudentController::class,'show']);
Route::put('/students/{student}',[\App\Http\Controllers\StudentController::class,'update']);
Route::delete('/students/{student}',[\App\Http\Controllers\StudentController::class,'destroy']);*/

Route::apiResource('students',\App\Http\Controllers\StudentController::class);
//Route::post('/students',[\App\Http\Controllers\StudentController::class,'store']);


