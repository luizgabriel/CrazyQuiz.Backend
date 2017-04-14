<?php

namespace Tests\Unit;

use CrazyQuiz\IQuestionnaire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuestionnaireTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @var IQuestionnaire
     */
    private $questionnaire;

    protected function setUp()
    {
        parent::setUp();
        $this->questionnaire = app()->make(IQuestionnaire::class);

        $this->seed('QuestionsSeeder');
    }


    public function testGetRandomQuestion()
    {
        $this->assertNotNull($this->questionnaire);

        $this->assertNotNull($this->questionnaire->getRandomQuestion());
        $this->assertNotNull($this->questionnaire->getRandomQuestion(2));
        $this->assertNotNull($this->questionnaire->getRandomQuestion(3, [1, 2, 4, 5, 6]));
    }
}
