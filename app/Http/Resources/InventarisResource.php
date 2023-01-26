<?php

namespace App\Http\Resources;

use App\Dao\Models\Brand;
use App\Dao\Models\Instansi;
use App\Dao\Models\InventarisNama;
use App\Dao\Models\InventarisTipe;
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
            'id' => $this->field_code,
            'nama' => $this->{InventarisNama::field_name()},
            'tipe_id' => $this->{$this->field_id_type()},
            'tipe_name' => $this->{InventarisTipe::field_name()},
            'instansi_id' => $this->{$this->field_id_instansi()},
            'instansi_name' => $this->{Instansi::field_name()},
            'lokasi_id' => $this->{$this->field_id_location()},
            'lokasi_name' => $this->{Lokasi::field_name()},
            'brand_id' => $this->{$this->field_id_brand()},
            'brand_name' => $this->{Brand::field_name()},
            'is_kalibrator' => $this->field_is_kalibrator,
            'is_asset' => $this->field_is_asset,
        ];
        // return parent::toArray($request);
    }
}
