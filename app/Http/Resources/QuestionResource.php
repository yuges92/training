<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'id'=>$this->id,
            'assignment_id'=>$this->assignment_id,
            'type'=>$this->type,
            'number'=>$this->number,
            'description'=>$this->description,
            'image'=>$this->getImage(),
            'video'=>$this->video,
            'textLimit'=>$this->textLimit,

            // 'createdBy'=>$this->createdBy(),
            // 'updatedBY'=>$this->updatedBY(),
            'answers'=>$this->answers,
            'criterias'=>$this->criterias->pluck('id'),
        ];
    }
}






