<?php

namespace CrazyQuiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * CrazyQuiz\Question
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrazyQuiz\QuestionOption[] $options
 * @mixin \Eloquent
 */
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
