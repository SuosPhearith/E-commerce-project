<?php

use Illuminate\Support\Facades\Route;
//:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Auth
Route::group(['prefix' => 'auth'], function () {
    require(__DIR__ . '/auth.php');
});

//:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Authenticated
Route::group(['middleware' => 'auth:sanctum'], function () {
    //:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Color
    require(__DIR__ . '/color.php');
    //:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Size
    require(__DIR__ . '/size.php');
    //:::::::::::::>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> Size
    require(__DIR__ . '/category.php');
});
