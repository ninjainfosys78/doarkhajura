<?php

namespace App\Http\Requests\ResearchUnit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreResearchUnitRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'research_unit_name' => ['required', 'string', 'max:255', Rule::unique('research_units', 'research_unit_name')->withoutTrashed()],
            'research_unit_name_en' => ['required', 'string', 'max:255', Rule::unique('research_units', 'research_unit_name_en')->withoutTrashed()],
            'research_unit_id' => ['nullable', Rule::exists('research_units', 'id')],
        ];
    }
}
