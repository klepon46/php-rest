<?php

use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Controller;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('/v1')->group(function (){
    Route::get('student',[StudentController::class, 'get']);
    Route::post('student',[StudentController::class, 'post']);
    Route::put('student/{id}',[StudentController::class, 'put']);
    Route::delete('student/{id}',[StudentController::class, 'delete']);
});
