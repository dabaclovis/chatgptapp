<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(PagesController::class)->group(function(){
    Route::get('/','index')->name('pages.index');
    Route::get('contact','contact')->name('pages.contact');
    Route::get('about','about')->name('pages.about');
    Route::get('articles','articles')->name('pages.blog');
});

Route::post("registration",[RegisterController::class,'myRegister'])->name('myRegistered');
Route::post('myLogin',[LoginController::class,'myLogination'])->name('mylogin');


