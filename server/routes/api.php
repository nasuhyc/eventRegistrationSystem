<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/hello44', function(){
    return 'Hello World323';
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Middleware
Route::group(['middleware'=>['auth:sanctum']], function(){
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/hello', function(Request $request){
    return 'Hello World';
});
});

