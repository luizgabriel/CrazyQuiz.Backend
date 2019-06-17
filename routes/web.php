<?php

/** @var \Illuminate\Routing\Router $router */

$router->get('/', 'Auth\LoginController@showLoginForm')->middleware('guest')->name('home');
$router->resource('questions', 'QuestionsController', ['expect' => 'show'])->middleware('auth');

Auth::routes();
