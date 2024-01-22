<?php

use App\Http\Controllers\Auth\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Finder\Iterator\CustomFilterIterator;

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


/*
|--------------------------------------------------------------------------
| API Roles: 1: admin  2: vendor  3: customer
|-------------------------------------------------------------------------- 
*/

Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['middleware' => 'authorization:1,2,3'], function () {
        Route::get('me', [UserAuthController::class, 'me']);
    });

    Route::get('logout', [UserAuthController::class, 'logout']);
});
