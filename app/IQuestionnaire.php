<?php

namespace CrazyQuiz;

use Illuminate\Support\Collection;

interface IQuestionnaire
{
    /**
     * @param int $level
     * @param array $answeredQuestions
     * @return Question|null
     */
    function getRandomQuestion($level = 1, array $answeredQuestions = []): ?Question;

    /**
     * @param int $level
     * @return Collection
     */
    function getQuestionsForLevel($level): Collection;
}