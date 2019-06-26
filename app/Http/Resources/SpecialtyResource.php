<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecialtyResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'filename' => $this->filename,
            'imagename' => $this->imagename,
            'user' => new UserResource($this->user),
            // 'specialtyArea' => $this->specialtyArea,
            'specialtyArea' => new SpecialtyAreaResource($this->specialtyArea),
            'created_at' => $this->created_at
        ];
    }
}
