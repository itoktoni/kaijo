<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InstansiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->{$this->field_code()},
            'name' => $this->{$this->field_name()},
            'lokasi' => LokasiResource::collection($this->has_lokasi)
        ];
        // return parent::toArray($request);
    }
}
