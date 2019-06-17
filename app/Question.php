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
 * @method static Question create(array $all)
 */
class Question extends Model
{
    protected $fillable = [
        'text',
    ];

    protected $casts = [
        'difficulty' => 'integer',
    ];

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

    /**
     * @return Model|HasMany|object|null
     */
    public function getAnswerAttribute()
    {
        return $this->options()->where('answer', true)->first();
    }

}
