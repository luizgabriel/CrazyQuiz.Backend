<?php

namespace CrazyQuiz\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class QuestionResource
 * @package CrazyQuiz\Http\Resources
 * @mixin \CrazyQuiz\Question
 */
class Question extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = $this->options()->orderBy('created_at')->get();

        return [
            'id' => $this->id,
            'text' => $this->text,
            'options' => QuestionOption::collection($options),
        ];
    }
}
