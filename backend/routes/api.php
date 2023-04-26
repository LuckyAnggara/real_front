<?php

use App\Http\Controllers\AccountDetailController;
use App\Http\Controllers\AccountHeaderController;
use App\Http\Controllers\AccountSubDetailController;
use App\Http\Controllers\CurrencyController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/account-header',[AccountHeaderController::class, 'index']);
Route::get('/account-detail',[AccountDetailController::class, 'index']);
Route::get('/account-sub-detail',[AccountSubDetailController::class, 'index']);
Route::get('/currency',[CurrencyController::class, 'index']);