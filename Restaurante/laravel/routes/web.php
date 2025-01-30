<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('productos', function () {
        return view('welcome');
    });
});

Auth::routes();
