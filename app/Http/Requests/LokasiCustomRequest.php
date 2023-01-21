<?php

namespace App\Http\Requests;

use App\Dao\Models\Rs;
use App\Dao\Models\LokasiCustom;
use App\Dao\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class LokasiCustomRequest extends FormRequest
{
    use ValidationTrait;

    public function validation() : array
    {
        return [
            LokasiCustom::field_name() => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            LokasiCustom::field_name() =>  Str::upper($this->{LokasiCustom::field_name()})
        ]);
    }

}
