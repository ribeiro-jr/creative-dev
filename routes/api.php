<?php

use App\Http\Controllers\FeedBackController;
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

    Route::get('/', [FeedBackController::class, 'index']);

    Route::post('/', [FeedBackController::class, 'store']);

    Route::get('/{feedback}', [FeedBackController::class, 'show']);

    Route::patch('/{feedback}', [FeedBackController::class, 'update']);

    Route::delete('/{feedback}', [FeedBackController::class, 'destroy']);
});
