<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CostController;




Route::group(['middleware'=>['auth']],function(){
    Route::get("/",[DashboardController::class,"index"])->name("dashboard");

    Route::group(['prefix' => 'cost'], function () {
        Route::get('index',[CostController::class,'index'])->name('cost.index');
        Route::get('create',[CostController::class,'create'])->name('cost.create');
        Route::post('store',[CostController::class,'store'])->name('cost.store');
        Route::get('edit/{id}',[CostController::class,'edit'])->name('cost.edit');
        Route::post('update/{id}',[CostController::class,'update'])->name('cost.update');
    });


});

require __DIR__.'/auth.php';
