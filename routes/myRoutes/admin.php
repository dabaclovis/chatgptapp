<?php

use App\Http\Controllers\AdminsController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminsController::class)->group(function(){
    Route::get('dashboard','index')->name('admins.index');
});
