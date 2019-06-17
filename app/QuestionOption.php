<?php

namespace CrazyQuiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * CrazyQuiz\QuestionOption
 *
 * @property-read \CrazyQuiz\Question $question
 * @mixin \Eloquent
 */
class QuestionOption extends Model
{
    protected $fillable = [
        'text',
        'answer'
    ];

    protected $casts = [
        'answer' => 'bool',
        'question_id' => 'integer'
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
