<?php

namespace CrazyQuiz\Providers;

use CrazyQuiz\IQuestionnaire;
use CrazyQuiz\Questionnaire;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IQuestionnaire::class, Questionnaire::class);
    }
}
