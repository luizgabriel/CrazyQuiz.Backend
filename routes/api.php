<?php

/** @var \Illuminate\Routing\Router $router */

$router->get('questions/random', 'API\QuestionsController@random');
$router->get('questions', 'API\QuestionsController@index');
$router->post('questions/{questions}/right', 'API\QuestionsController@notifyRight');
$router->post('questions/{questions}/wrong', 'API\QuestionsController@notifyWrong');
