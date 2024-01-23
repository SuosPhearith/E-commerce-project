<?php
//:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Project

use App\Http\Controllers\ColorController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'color'], function () {
    Route::get('/', [ColorController::class, 'getAll'])->middleware('authorization:1,2,3');
    Route::get('/{id}', [ColorController::class, 'getById'])->middleware('authorization:1,2,3');
    Route::post('/', [ColorController::class, 'create'])->middleware('authorization:1,2');
    Route::patch('/{id}', [ColorController::class, 'update'])->middleware('authorization:1,2');
    Route::delete('/{id}', [ColorController::class, 'delete'])->middleware('authorization:1,2');
});
