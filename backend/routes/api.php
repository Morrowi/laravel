<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ManagerController;

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



Route::get('/manager', [ ManagerController::class, 'index' ]);
Route::get('/manager/{id}', [ ManagerController::class, 'show' ]);
Route::delete('/manager/{id}', [ ManagerController::class, 'delete' ]);
Route::post('/manager/{id}/edit', [ ManagerController::class, 'edit' ]);
