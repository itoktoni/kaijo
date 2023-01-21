<?php

namespace App\Http\Requests;

use App\Dao\Models\ListInventaris;
use App\Dao\Traits\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ListInventarisRequest extends FormRequest
{
    use ValidationTrait;

    public function validation() : array
    {
        return [
            ListInventaris::field_name() => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            ListInventaris::field_name() =>  Str::upper($this->{ListInventaris::field_name()})
        ]);
    }

}
