<?php

namespace CrazyQuiz;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'text',
        'level',
        'hint',
    ];

    protected $casts = [
        'level' => 'integer',
    ];

    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

}
