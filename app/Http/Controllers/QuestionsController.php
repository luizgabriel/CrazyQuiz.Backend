<?php

namespace CrazyQuiz\Http\Controllers;

use CrazyQuiz\IQuestionnaire;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function random(Request $request, IQuestionnaire $questionnaire)
    {
        $level = (int) $request->get('level', 1);
        $answeredQuestions = explode(',', $request->get('answered', ""));
        $question = $questionnaire->getRandomQuestion($level, $answeredQuestions);

        return $this->api($question);
    }

}
