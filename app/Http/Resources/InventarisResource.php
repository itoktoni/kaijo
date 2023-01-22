<?php

namespace App\Http\Resources;

use App\Dao\Models\InventarisNama;
use App\Dao\Models\Lokasi;
use Illuminate\Http\Resources\Json\JsonResource;

class InventarisResource extends JsonResource
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
            'name' => $this->{InventarisNama::field_name()},
            'location' => $this->{Lokasi::field_name()},
        ];
        // return parent::toArray($request);
    }
}
