<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarrientyController;


Route::group(['middleware'=>['auth']],function(){
    Route::get("/",[DashboardController::class,"index"])->name("dashboard");

});

require __DIR__.'/auth.php';
