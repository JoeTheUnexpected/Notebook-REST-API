<?php

use App\Http\Controllers\NotebookApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('notebook', [NotebookApiController::class, 'index']);
Route::post('notebook', [NotebookApiController::class, 'store']);
Route::get('notebook/{notebook}', [NotebookApiController::class, 'show']);
Route::post('notebook/{notebook}', [NotebookApiController::class, 'update']);
Route::delete('notebook/{notebook}', [NotebookApiController::class, 'destroy']);
