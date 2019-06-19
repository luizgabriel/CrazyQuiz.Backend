<?php

namespace CrazyQuiz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * CrazyQuiz\QuestionOption
 *
 * @property int $id
 * @property string $text
 * @property boolean $answer
 * @property-read Question $question
 * @mixin Model
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
