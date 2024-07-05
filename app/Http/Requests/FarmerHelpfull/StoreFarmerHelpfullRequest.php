<?php

namespace App\Http\Requests\FarmerHelpfull;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class StoreFarmerHelpfullRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'slug' => ['required', 'alpha_dash', ValidationRule::unique('farmer_helpfulls', 'slug')],
            'description' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'photo' => ['nullable', 'file', 'mimes:png,jpg,jpeg,pdf'],
            'research_unit_id' => ['nullable', Rule::exists('research_units', 'id')->withoutTrashed()],
        ];
    }
}
