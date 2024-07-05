<?php

namespace App\Http\Requests\FarmerHelpfull;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;

class UpdateFarmerHelpfullRequest extends FormRequest
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
            'slug' => ['required', 'alpha_dash',Rule::unique('farmer_helpfulls', 'slug')->ignore($this->farmerHelpfull)],
            'description' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'photo' => ['nullable', 'file', 'mimes:png,jpg,jpeg,pdf'],
            'research_unit_id' => ['nullable', Rule::exists('research_units', 'id')->withoutTrashed()],
        ];
    }
}
