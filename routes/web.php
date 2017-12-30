<?php

Route::get('/', 'Auth\LoginController@showLoginForm');


Route::group(['middleware' => 'guest'], function() {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::resource('questions', 'QuestionsController');
});



