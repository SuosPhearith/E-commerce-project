<?php
//:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Project

use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'size'], function () {
    Route::get('/', [SizeController::class, 'getAll'])->middleware('authorization:1,2,3');
    Route::get('/{id}', [SizeController::class, 'getById'])->middleware('authorization:1,2,3');
    Route::post('/', [SizeController::class, 'create'])->middleware('authorization:1,2');
    Route::patch('/{id}', [SizeController::class, 'update'])->middleware('authorization:1,2');
    Route::delete('/{id}', [SizeController::class, 'delete'])->middleware('authorization:1,2');
});
