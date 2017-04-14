<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
}
