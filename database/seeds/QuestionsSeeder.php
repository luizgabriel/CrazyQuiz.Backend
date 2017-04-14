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
        foreach (range(1, 5) as $level) {
            foreach (range(0, 25) as $i) {
                $q = factory(Question::class)->create(['level' => $level]);
                $opts = factory(QuestionOption::class)
                    ->times(4)
                    ->create([ 'question_id' => $q->id ]);

                $opts->random(1)->first()->update(['answer' => true]);
            }
        }

    }
}
