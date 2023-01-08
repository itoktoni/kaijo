<?php

namespace App\Http\Requests;

use App\Dao\Models\Rs;
use App\Dao\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RsRequest extends FormRequest
{
    use ValidationTrait;

    public function validation() : array
    {
        return [
            'rs_nama' => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            Rs::field_name() =>  Str::upper($this->{Rs::field_name()})
        ]);
    }

}
