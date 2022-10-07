<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\BacchaMrittuController;
use App\Http\Controllers\BacchaOjunController;

Route::group(['middleware'=>['auth']],function(){
    Route::get("/",[DashboardController::class,"index"])->name("dashboard");

    Route::group(['prefix' => 'cost'], function () {
        Route::get('index',[CostController::class,'index'])->name('cost.index');
        Route::get('create',[CostController::class,'create'])->name('cost.create');
        Route::post('store',[CostController::class,'store'])->name('cost.store');
        Route::get('destroy/{id}',[CostController::class,'destroy'])->name('cost.destroy');
        Route::get('edit/{id}',[CostController::class,'edit'])->name('cost.edit');
        Route::post('update/{id}',[CostController::class,'update'])->name('cost.update');
        Route::get('filter',[CostController::class,'filter'])->name('cost.filter');

    });

    Route::group(['prefix' => 'sheet'], function () {
        Route::post('store',[SheetController::class,'store'])->name('sheet.store');
        Route::post('set-current-sheet',[SheetController::class,'setCurrent'])->name('sheet.current.set');

    });

    Route::group(['prefix' => 'baccha/mrittu'], function () {
        Route::get('index',[BacchaMrittuController::class,'index'])->name('baccha.mirttu.index');
        Route::post('store',[BacchaMrittuController::class,'store'])->name('baccha.mirttu.store');
        Route::get('destroy/{id}',[BacchaMrittuController::class,'destroy'])->name('baccha.mirttu.destroy');
        Route::get('get-single-info/{id}',[BacchaMrittuController::class,'getSingleInfo'])->name('baccha.mirttu.single.info');
        Route::post('update',[BacchaMrittuController::class,'update'])->name('baccha.mirttu.update');
        Route::get('filter',[BacchaMrittuController::class,'filter'])->name('baccha.mirttu.filter');


    });

    Route::group(['prefix' => 'baccha/ojun'], function () {
        Route::get('index',[BacchaOjunController::class,'index'])->name('baccha.ojun.index');
        Route::post('store',[BacchaOjunController::class,'store'])->name('baccha.ojun.store');
        Route::get('destroy/{id}',[BacchaOjunController::class,'destroy'])->name('baccha.ojun.destroy');
        Route::get('get-single-info/{id}',[BacchaOjunController::class,'getSingleInfo'])->name('baccha.ojun.single.info');
        Route::post('update',[BacchaOjunController::class,'update'])->name('baccha.ojun.update');
        Route::get('filter',[BacchaOjunController::class,'filter'])->name('baccha.ojun.filter');

    });


});

require __DIR__.'/auth.php';
