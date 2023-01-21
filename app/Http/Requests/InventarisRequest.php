<?php

namespace App\Http\Requests;

use App\Dao\Models\Inventaris;
use App\Dao\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class InventarisRequest extends FormRequest
{
    use ValidationTrait;

    public function validation() : array
    {
        return [
            Inventaris::field_name() => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            Inventaris::field_name() =>  Str::upper($this->{Inventaris::field_name()})
        ]);
    }

}
