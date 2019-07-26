<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassEventResource extends JsonResource
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
            "id"=>$this->id,
            "course"=>$this->course,
            "course_id"=>$this->course_id,
            "title"=>$this->title,
            "address_id"=>$this->address_id,
            "address"=>$this->address->id,
            "classDates"=>$this->classDates,
            "startDate"=>$this->getStartDate(),
            "slug"=>$this->slug,
            "link"=>$this->getLink(),
            "description"=>$this->description,
            "type"=>$this->type,
            "space"=>$this->space,
            "availableSpace"=>$this->availableSpace,
            "price"=>$this->price,
            "moderator"=>$this->moderator ?? '',
            "moderator_id"=>$this->moderator_id ?? '',
            "trainers"=>$this->trainers ?? '',
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
            "createdBy"=>$this->createdBy,
            "updatedBY"=> $this->updatedBY,
        ];
    }
}
