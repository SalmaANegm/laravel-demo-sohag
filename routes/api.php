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

// Route::get('posts', ['\App\Http\Controllers\API\ArticleController', 'index']);
// Route::get('posts/{article}', ['\App\Http\Controllers\API\ArticleController', 'show']);

Route::apiResource('articles', '\App\Http\Controllers\API\ArticleController')->middleware('auth:sanctum');

// Route::post('articles', ['\App\Http\Controllers\API\ArticleController', 'store'])->middleware(['auth:sanctum']);
Route::post('login', ['App\Http\Controllers\API\AuthController', 'login']);
