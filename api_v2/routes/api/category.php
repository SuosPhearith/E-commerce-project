<?php
//:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Project

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'getAll'])->middleware('authorization:1,2,3');
    Route::get('/{id}', [CategoryController::class, 'getById'])->middleware('authorization:1,2,3');
    Route::post('/', [CategoryController::class, 'create'])->middleware('authorization:1,2');
    Route::patch('/{id}', [CategoryController::class, 'update'])->middleware('authorization:1,2');
    Route::delete('/{id}', [CategoryController::class, 'delete'])->middleware('authorization:1,2');
});
