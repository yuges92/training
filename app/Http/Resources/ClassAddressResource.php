<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassAddressResource extends JsonResource
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
            'id' => $this->id,
            'line1' => $this->line1,
            'line2' => $this->line2,
            'town' => $this->town,
            'county' => $this->county,
            'postcode' => $this->postcode,
            'country' => $this->country,
            'fullAddress' => $this->getFullAddress(),
        ];
    }
}






