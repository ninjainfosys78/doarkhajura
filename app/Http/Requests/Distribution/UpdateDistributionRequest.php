<?php

namespace App\Http\Requests\Distribution;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDistributionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'pedigree_id' => ['nullable', Rule::exists('pedigrees', 'id')->withoutTrashed()],
            'address' => ['required', 'string'],
            'duration' => ['required', 'numeric'],
            'remarks' => ['required', 'string']
        ];
    }
}
