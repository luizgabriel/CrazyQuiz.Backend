<?php

namespace CrazyQuiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

}
