<?php

namespace CrazyQuiz\Http\Controllers;

use CrazyQuiz\Question;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('updated_at', 'desc')->paginate(15);
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var Question $question */
        $question = Question::create($request->only('text', 'level', 'hint'));
        $options = $request->get('options');

        for ($i = 0; $i < count($options); $i++) {
            $data = $options[$i];
            $data['answer'] = $request->get('answer') == $i? true: false;
            $question->options()->create($options[$i]);
        }

        $request->session()->flash('questions.created', true);

        return redirect()->route('questions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \CrazyQuiz\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \CrazyQuiz\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        /** @var Question $question */
        $question->update($request->only('text', 'level', 'hint'));
        $options = $request->get('options');

        foreach ($options as $id => $option) {
            $option['answer'] = $request->get('answer') == $id? true: false;
            $question->options()->where('id', $id)->update($option);
        }

        $request->session()->flash('questions.updated', true);

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \CrazyQuiz\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index');
    }
}
