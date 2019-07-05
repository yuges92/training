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
            'type'=>$this->type,
            'number'=>$this->number,
            'description'=>$this->description,
            'image'=>$this->getImage(),
            'video'=>$this->video,
            // 'createdBy'=>$this->createdBy(),
            // 'updatedBY'=>$this->updatedBY(),
            // 'answers'=>$this->answers,
            'criterias'=>$this->criterias->pluck('id'),
        ];
    }
}






