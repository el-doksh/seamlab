<?php

use App\Http\Controllers\TaskOneController;
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

Route::get('count-numbers/{start}/{end}', [TaskOneController::class, 'count_numbers']);
Route::get('string-index/{input_string}', [TaskOneController::class, 'string_index']);
Route::get('steps-count', [TaskOneController::class, 'steps_count']);