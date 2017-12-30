<?php

namespace CrazyQuiz;


use Carbon\Carbon;
use Illuminate\Support\Collection;

class CrazyQuizQuestionnaire
{
    /**
     * @param array $answeredQuestions
     * @return Question|null
     */
    public function getRandomQuestion(array $answeredQuestions = [])
    {
        $question = Question::with('options')
            ->whereNotIn('id', $answeredQuestions)
            ->inRandomOrder()
            ->first();

        return $question;
    }

    function getQuestions(Carbon $lastRefresh = null): Collection
    {
        $query = Question::with('options');

        if (!empty($lastRefresh))
            $query = $query->where('updated_at', '>', $lastRefresh);


        return $query->orderBy('difficulty', 'asc')->get();
    }


}