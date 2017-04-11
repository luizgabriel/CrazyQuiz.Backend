<?php

namespace CrazyQuiz;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'text',
        'level',
        'hint',
        'right_option_id',
    ];

    protected $casts = [
        'level' => 'integer',
        'right_option_id' => 'integer'
    ];

    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

    public function rightOption()
    {
        return $this->belongsTo(QuestionOption::class, 'right_option_id');
    }

}
