<?php

namespace CrazyQuiz;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $fillable = [
        'text',
        'answer',
        'question_id'
    ];

    protected $casts = [
        'answer' => 'bool',
        'question_id' => 'integer'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
