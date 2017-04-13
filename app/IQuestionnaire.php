<?php

namespace CrazyQuiz;

interface IQuestionnaire
{
    function getRandomQuestion($level = 1, array $answeredQuestions = []): Question;
}