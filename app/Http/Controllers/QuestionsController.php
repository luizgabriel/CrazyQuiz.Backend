<?php

namespace CrazyQuiz\Http\Controllers;

use CrazyQuiz\Http\Requests\QuestionRequest;
use CrazyQuiz\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::paginate(15);
        $easy = Question::easyDifficulty()->count();
        $hard = Question::hardDifficulty()->count();
        $normal = Question::normalDifficulty()->count();

        return view('questions.index', compact('questions', 'easy', 'hard', 'normal'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function store(QuestionRequest $request)
    {
        $question = Question::create($request->all());
        $question->options()->createMany($request->get('options'));

        return redirect()
            ->route('questions.index')
            ->with(['questions.created' => true]);
    }

    public function update(QuestionRequest $request, Question $question)
    {
        $question->update($request->all());
        $question->options()->delete();
        $question->options()->createMany($request->get('options'));

        return redirect()
            ->route('questions.index')
            ->with(['questions.updated' => true]);
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index');
    }
}
