<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Feature\EnumController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Event\EventController;


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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Middleware
Route::group(['middleware'=>['auth:sanctum']], function(){
//Logout
Route::post('/logout', [AuthController::class, 'logout']);
//Enum
Route::get('/enums', [EnumController::class, 'index']);


//Role Management
Route::prefix('role')->name('.role')->group(function(){
    Route::get('/', [RoleController::class, 'index'])->name('.index');
    Route::post('/', [RoleController::class, 'store'])->name('.store');
    Route::get('/{id}', [RoleController::class, 'show'])->name('.show');
    Route::put('/{id}', [RoleController::class, 'update'])->name('.update');
    Route::delete('/{id}', [RoleController::class, 'destroy'])->name('.destroy');
});

//Event Management
Route::prefix('event')->name('.event')->group(function(){
    Route::get('/', [EventController::class, 'myevent'])->name('.myevent');
    Route::post('/', [EventController::class, 'store'])->name('.store');
    Route::get('/{id}', [EventController::class, 'show'])->name('.show');
    Route::put('/{id}', [EventController::class, 'update'])->name('.update');
    Route::delete('/{id}', [EventController::class, 'destroy'])->name('.destroy');
});

//Event
Route::get('/events', [EventController::class, 'events'])->name('.events');



});

