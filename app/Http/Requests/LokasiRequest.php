<?php

namespace App\Http\Requests;

use App\Dao\Models\Lokasi;
use App\Dao\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class LokasiRequest extends FormRequest
{
    use ValidationTrait;

    public function validation() : array
    {
        return [
            Lokasi::field_name() => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            Lokasi::field_name() =>  Str::upper($this->{Lokasi::field_name()})
        ]);
    }

}
