<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            "course_code"=>$this->course_code,
            "course_type_id"=>$this->course_type_id,
            "title"=>$this->title,
            "status"=>$this->status,
            "enable_megamenu"=>$this->enable_megamenu,
            "position"=>$this->position,
            "password"=>$this->password,
            "description"=>$this->description,
            "body"=>$this->body,
            "image"=>$this->getImage(),
            "course_type_id"=>$this->course_type_id,
            "classes"=>$this->classes,
            "createdBy"=>$this->createdBy,
            "updatedBY"=> $this->updatedBY,
          ];
    }
}















