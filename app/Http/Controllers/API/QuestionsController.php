<?php

namespace CrazyQuiz\Http\Controllers\API;

use Carbon\Carbon;
use CrazyQuiz\CrazyQuizQuestionnaire;
use CrazyQuiz\Http\Controllers\Controller;
use CrazyQuiz\Question;
use CrazyQuiz\QuestionOption;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * @param Request $request
     * @param CrazyQuizQuestionnaire $questionnaire
     * @return \Illuminate\Http\JsonResponse
     */
    public function random(Request $request, CrazyQuizQuestionnaire $questionnaire)
    {
        $answeredQuestions = array_map('intval', explode(',', $request->get('answered', "")));
        $question = $questionnaire->getRandomQuestion($answeredQuestions);

        return $this->api($question);
    }

    public function notifyRight(Question $question)
    {
        $question->difficulty -= ($question->difficulty > 0) ? 2 : 0;
        $question->save();
    }

    public function notifyWrong(Question $question)
    {
        $question->difficulty += 10;
        $question->save();
    }

    /**
     * @param Request $request
     * @param CrazyQuizQuestionnaire $questionnaire
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, CrazyQuizQuestionnaire $questionnaire)
    {
        $lastRefresh = $request->get('last_refresh');
        if (!empty($lastRefresh))
            $lastRefresh = Carbon::createFromFormat( 'Y-m-d H:i:s', $lastRefresh);

        $questions = $questionnaire->getQuestions($lastRefresh)->map(function (Question $question) {
            $data = array_only($question->toArray(), ['id', 'text']);
            $data['options'] = $question->options->map(function (QuestionOption $option) {
               return array_only($option->toArray(), ['id', 'text', 'answer']);
            })->sortBy('id')->values();

            return $data;
        });

        return $this->api($questions->toArray());
    }

}
