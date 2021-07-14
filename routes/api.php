<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
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
Route::group(['prefix' => 'example'], function() {
    Route::get('/orders', [OrderController::class, 'get']);
    Route::get('/orders-test', [OrderController::class, 'getTest']);
    Route::get('/orders-collections', [OrderController::class, 'getCollection']);
});

// --------

Route::group(['prefix' => 'categories'], function(){
    Route::get('/{category}', [CategoryController::class, 'get']);
    Route::get('/', [CategoryController::class, 'getAll']);
    Route::post('/', [CategoryController::class, 'create']);
    Route::patch('/{category}', [CategoryController::class, 'patch']);
    Route::delete('/{category}', [CategoryController::class, 'delete']);
});

Route::group(['prefix' => 'albums'], function(){
    Route::post('/', [AlbumController::class, 'create']);
    Route::post('/{album}', [AlbumController::class, 'multipleUpload']);
});

