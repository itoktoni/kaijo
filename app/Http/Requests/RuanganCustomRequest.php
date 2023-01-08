<?php

namespace App\Http\Requests;

use App\Dao\Models\Rs;
use App\Dao\Models\RuanganCustom;
use App\Dao\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RuanganCustomRequest extends FormRequest
{
    use ValidationTrait;

    public function validation() : array
    {
        return [
            'rc_nama' => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            RuanganCustom::field_name() =>  Str::upper($this->{RuanganCustom::field_name()})
        ]);
    }

}
