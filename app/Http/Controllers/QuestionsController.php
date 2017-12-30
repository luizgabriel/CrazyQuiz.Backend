<?php

namespace CrazyQuiz\Http\Controllers;

use CrazyQuiz\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function index()
    {
        $questions = Question::paginate(15);
        return view('questions.index', compact('questions'));
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        /** @var Question $question */
        $question = Question::create($request->only('text'));
        $options = $request->get('options');
        $answer = $request->get('answer');

        for ($i = 0; $i < count($options); $i++) {
            $data = $options[$i];
            $data['answer'] = $answer == $i;
            $question->options()->create($options[$i]);
        }

        $request->session()->flash('questions.created', true);

        return redirect()->route('questions.index');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index');
    }
}
