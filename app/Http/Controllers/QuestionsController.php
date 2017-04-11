<?php

namespace CrazyQuiz\Http\Controllers;

use CrazyQuiz\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function random(Request $request)
    {
        $level = (int) $request->get('level', 1);
        $answeredQuestions = explode(',', $request->get('answered', ""));
        $question = Question::with('options')
            ->where('level', $level)
            ->whereNotIn('id', $answeredQuestions)
            ->random(1)
            ->first();

        return $this->api($question);
    }

}
