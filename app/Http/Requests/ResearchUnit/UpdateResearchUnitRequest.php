<?php

namespace App\Http\Requests\ResearchUnit;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateResearchUnitRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'research_unit_name' => ['required', 'string', 'max:255', Rule::unique('research_units', 'research_unit_name')->withoutTrashed()->ignore($this->ResearchUnit)],
            'research_unit_name_en' => ['required', 'string', 'max:255', Rule::unique('research_units', 'research_unit_name_en')->withoutTrashed()->ignore($this->ResearchUnit)],
            'research_unit_id' => ['nullable', Rule::exists('research_units', 'id')],
        ];
    }
}
