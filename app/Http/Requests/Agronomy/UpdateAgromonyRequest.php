<?php

namespace App\Http\Requests\Agronomy;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAgromonyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'=>['nullable','string'],
            'title_en'=>['nullable','string'],
            'quotes'=>['nullable','string'],
            'quotes_en'=>['nullable','string'],
            'description'=>['nullable','string'],
            'description_en'=>['nullable','string'],
            'photo' => ['nullable', 'image'],
            'research_unit_id' => ['nullable', Rule::exists('research_units', 'id')->withoutTrashed()],
            'scientist_id' => ['nullable', Rule::exists('employees', 'id')->withoutTrashed()],
            'technical_officer_id' => ['nullable', Rule::exists('employees', 'id')->withoutTrashed()],
        ];
    }
}
