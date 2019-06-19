<?php

namespace CrazyQuiz\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class QuestionOption
 * @package CrazyQuiz\Http\Resources
 * @mixin \CrazyQuiz\QuestionOption
 */
class QuestionOption extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'text' => $this->text,
            'answer' => $this->answer
        ];
    }
}
