<?php

namespace CrazyQuiz\Http\Controllers\API;

use Carbon\Carbon;
use CrazyQuiz\CrazyQuizQuestionnaire;
use CrazyQuiz\Http\Controllers\Controller;
use CrazyQuiz\Question;
use CrazyQuiz\Http\Resources\Question as QuestionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class QuestionsController extends Controller
{
    /**
     * @param Request $request
     * @param CrazyQuizQuestionnaire $questionnaire
     * @return QuestionResource
     */
    public function random(Request $request, CrazyQuizQuestionnaire $questionnaire)
    {
        $answeredQuestions = array_map('intval', explode(',', $request->get('answered', "")));
        $question = $questionnaire->getRandomQuestion($answeredQuestions);

        return new QuestionResource($question);
    }

    public function notifyRight(Question $question)
    {
        $question->difficulty -= 0.5;
        $question->save();
    }

    public function notifyWrong(Question $question)
    {
        $question->difficulty += 0.2;
        $question->save();
    }

    /**
     * @param Request $request
     * @param CrazyQuizQuestionnaire $questionnaire
     * @return AnonymousResourceCollection
     */
    public function index(Request $request, CrazyQuizQuestionnaire $questionnaire)
    {
        $lastRefresh = $request->get('last_refresh');
        if (!empty($lastRefresh))
            $lastRefresh = Carbon::createFromFormat('Y-m-d H:i:s', $lastRefresh);

        $questions = $questionnaire->getQuestions($lastRefresh);
        return QuestionResource::collection($questions->toArray());
    }

}
