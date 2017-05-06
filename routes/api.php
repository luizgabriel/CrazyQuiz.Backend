<?php

/** @var \Illuminate\Routing\Router $router */

$router->get('questions/random', 'QuestionsController@random');
$router->get('questions', 'QuestionsController@index');