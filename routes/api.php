<?php

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

Route::group(['prefix' => 'feedbacks'], function () {

    Route::get('/', function () {
        return response()->json([
            'status_code' => 200,
            'message' => 'read all'
        ]);
    });

    Route::post('/', function () {
        return response()->json([
            'status_code' => 200,
            'message' => 'create'
        ]);
    });

    Route::get('/{feedback}', function () {
        return response()->json([
            'status_code' => 200,
            'message' => 'read'
        ]);
    });

    Route::patch('/{feedback}', function () {
        return response()->json([
            'status_code' => 200,
            'message' => 'update'
        ]);
    });

    Route::delete('/{feedback}', function () {
        return response()->json([
            'status_code' => 200,
            'message' => 'delete'
        ]);
    });
});
