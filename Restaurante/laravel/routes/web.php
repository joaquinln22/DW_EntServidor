<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function(){
    Route::get('private', function () {
        return 'Holadfgfdgdfs';
    });
});


Route::get('publico', function () {
    return view('publico.index');
});

Auth::routes();
