<?php

namespace App\Http\Requests;

use App\Dao\Models\Ruangan;
use App\Dao\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RuanganRequest extends FormRequest
{
    use ValidationTrait;

    public function validation() : array
    {
        return [
            'ruangan_nama' => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            Ruangan::field_name() =>  Str::upper($this->{Ruangan::field_name()})
        ]);
    }

}
