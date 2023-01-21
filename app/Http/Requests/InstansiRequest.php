<?php

namespace App\Http\Requests;

use App\Dao\Models\Instansi;
use App\Dao\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class InstansiRequest extends FormRequest
{
    use ValidationTrait;

    public function validation() : array
    {
        return [
            Instansi::field_name() => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            Instansi::field_name() =>  Str::upper($this->{Instansi::field_name()})
        ]);
    }

}
