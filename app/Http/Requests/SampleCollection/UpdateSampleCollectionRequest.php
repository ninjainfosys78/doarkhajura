<?php

namespace App\Http\Requests\SampleCollection;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSampleCollectionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'comment' => ['required', 'string']
        ];
    }
}
