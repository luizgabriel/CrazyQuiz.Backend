<?php

namespace Tests\Feature;

use CrazyQuiz\Question;
use Tests\TestCase;

class QuestionsApi extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetRandomQuestion()
    {
        $this->get('/api/questions/random')
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'text',
                    'hint',
                    'options' => [
                        '*' => [
                            'id',
                            'text',
                            'answer'
                        ]
                    ],
                ],
                'size'
            ]);
    }

    public function testGetRandomQuestionWithinLevel()
    {
        $this->get('/api/questions/random?level=4')
            ->assertJsonFragment([
               'level' => 4,
            ]);
    }

    public function testFinishedLevel()
    {
        $qs = Question::where('level', 1)->get()->pluck('id')->implode(',');
        $this->get("/api/questions/random?answered={$qs}")
            ->assertJsonFragment([
                'level' => 2,
            ]);
    }

    public function testFinishedGame()
    {
        $qs = Question::all()->pluck('id')->implode(',');
        $this->get("/api/questions/random?answered={$qs}")
            ->assertJsonFragment([
                'data' => null,
            ]);
    }
}
