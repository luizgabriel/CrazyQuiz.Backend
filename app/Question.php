<?php

namespace CrazyQuiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * CrazyQuiz\Question
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\CrazyQuiz\QuestionOption[] $options
 * @property int id
 * @property string text
 * @property mixed difficulty
 * @mixin \Eloquent
 */
class Question extends Model
{
    protected $fillable = [
        'text',
        'difficulty',
    ];

    protected $casts = [
        'difficulty' => 'integer',
    ];

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

}
