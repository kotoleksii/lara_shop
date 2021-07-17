<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
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

Route::group(['prefix' => 'orders'], function() {
    Route::get('/{order}', [OrderController::class, 'get']);
    Route::get('/', [OrderController::class, 'getAll']);
    Route::post('/', [OrderController::class, 'create']);
    Route::patch('/{order}', [OrderController::class, 'patch']);
    Route::delete('/{order}', [OrderController::class, 'delete']);
});

Route::group(['prefix'=> 'images'], function(){
    Route::get('/{id}', [ImageController::class, 'download']);
});
