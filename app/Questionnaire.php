<?php

namespace CrazyQuiz;


class Questionnaire implements IQuestionnaire
{
    public function getRandomQuestion($level = 1, array $answeredQuestions = []): Question
    {
        $question = Question::with('options')
            ->where('level', $level)
            ->whereNotIn('id', $answeredQuestions)
            ->inRandomOrder()
            ->first();

        if (!$question && $this->hasExtraLevel($level)) {
            return $this->getRandomQuestion($level + 1, $answeredQuestions);
        } else {
            return $question;
        }
    }

    public function hasExtraLevel($currentLevel): bool
    {
        return Question::where('level', $currentLevel + 1)->count() > 0;
    }
}