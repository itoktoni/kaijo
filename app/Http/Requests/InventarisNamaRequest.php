<?php

namespace App\Http\Requests;

use App\Dao\Models\InventarisNama;
use App\Dao\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class InventarisNamaRequest extends FormRequest
{
    use ValidationTrait;

    public function validation() : array
    {
        return [
            InventarisNama::field_name() => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            InventarisNama::field_name() =>  Str::upper($this->{InventarisNama::field_name()})
        ]);
    }

}
