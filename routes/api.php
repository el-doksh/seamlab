<?php

use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProblemSolvingController;
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

Route::get('count-numbers/{start}/{end}', [ProblemSolvingController::class, 'count_numbers']);
Route::get('string-index/{input_string}', [ProblemSolvingController::class, 'string_index']);
Route::get('steps-count', [ProblemSolvingController::class, 'steps_count']);
Route::get('menu-items', [MenuItemController::class, 'index']);
Route::post('order', [OrderController::class, 'store']);