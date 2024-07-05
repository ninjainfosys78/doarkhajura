<?php

namespace App\Http\Requests\SampleCollection;

use Illuminate\Foundation\Http\FormRequest;

class StoreSampleCollectionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
{
    return [
        'full_name' => ['required', 'string'],
        'phone' => ['required', 'string'],
        'address' => ['required', 'string'],
        'images'=> ['nullable', 'array'],
        'images.*' => ['mimes:jpg,jpeg,png'],
        'remarks' => ['required'],
    ];
}

}
