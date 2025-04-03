<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;

Route::controller(HomeController::class)->group(function(){
    Route::get('/dashboard','index')->name('home');
});

Route::resource('posts', PostsController::class);

