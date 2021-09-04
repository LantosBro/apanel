<?php

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

Route::get('/books/list', [\App\Http\Controllers\Api\v1\ApiController::class, 'getBooks']);
Route::get('/books/by-id/{id}', [\App\Http\Controllers\Api\v1\ApiController::class, 'getBookById'])->where('id', '[0-9]+');
Route::post('/books/update', [\App\Http\Controllers\Api\v1\ApiController::class, 'updateBook']);
