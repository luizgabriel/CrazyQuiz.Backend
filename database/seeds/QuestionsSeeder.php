<?php

use CrazyQuiz\Question;
use CrazyQuiz\QuestionOption;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t = app()->environment('testing')? 20 : 300;
        foreach (range(0, $t) as $i) {
            $q = factory(Question::class)->create();
            $opts = factory(QuestionOption::class)
                ->times(4)
                ->create([ 'question_id' => $q->id ]);

            $opts->random(1)->first()->update(['answer' => true]);
        }

    }
}
