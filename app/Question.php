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
 * @property float difficulty
 * @property string difficulty_type
 * @mixin \Eloquent
 * @method static Question create(array $all)
 */
class Question extends Model
{
    protected $fillable = [
        'text',
    ];

    protected $casts = [
        'difficulty' => 'float',
    ];

    const DIFFICULTY_THRESHOLD = 5;
    const DIFFICULTY_EASY = 'easy';
    const DIFFICULTY_NORMAL = 'normal';
    const DIFFICULTY_HARD = 'hard';

    public function scopeEasyDifficulty($query)
    {
        return $query->where('difficulty', '<', -static::DIFFICULTY_THRESHOLD);
    }

    public function scopeNormalDifficulty($query)
    {
        return $query->where('difficulty', '>', -static::DIFFICULTY_THRESHOLD)
            ->where('difficulty', '<', static::DIFFICULTY_THRESHOLD);
    }

    public function scopeHardDifficulty($query)
    {
        return $query->where('difficulty', '>', static::DIFFICULTY_THRESHOLD);
    }

    public function getDifficultyTypeAttribute()
    {
        if ($this->difficulty > static::DIFFICULTY_THRESHOLD) {
            return static::DIFFICULTY_HARD;
        } else if ($this->difficulty < -static::DIFFICULTY_THRESHOLD) {
            return static::DIFFICULTY_EASY;
        } else {
            return static::DIFFICULTY_NORMAL;
        }
    }

    public function getEasyAttribute()
    {
        return $this->difficulty_type == static::DIFFICULTY_EASY;
    }

    public function getHardAttribute()
    {
        return $this->difficulty_type == static::DIFFICULTY_HARD;
    }

    public function getNormalAttribute()
    {
        return $this->difficulty_type == static::DIFFICULTY_NORMAL;
    }

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
