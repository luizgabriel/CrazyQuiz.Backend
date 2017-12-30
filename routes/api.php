<?php

/** @var \Illuminate\Routing\Router $router */

$router->get('questions/random', 'API\QuestionsController@random');
$router->get('questions', 'API\QuestionsController@index');
$router->get('questions/{questions}/right', 'API\QuestionsController@notifyRight');
$router->get('questions/{questions}/wrong', 'API\QuestionsController@notifyWrong');