<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(CrazyQuiz\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CrazyQuiz\Question::class, function (Faker\Generator $faker) {
    return [
        'text' => str_replace('.', '?', $faker->sentence(8)),
        'difficulty' => $faker->randomNumber(2),
    ];
});


$factory->define(CrazyQuiz\QuestionOption::class, function (Faker\Generator $faker) {
    return [
        'text' => $faker->sentence(4),
        'question_id' => function () {
            return factory(\CrazyQuiz\Question::class)->create()->id;
        }
    ];
});