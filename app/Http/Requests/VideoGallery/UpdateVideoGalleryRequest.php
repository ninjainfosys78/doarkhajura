<?php

namespace App\Http\Requests\VideoGallery;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVideoGalleryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'url' => ['required', 'url'],
            'research_unit_id' => ['nullable', Rule::exists('research_units', 'id')->withoutTrashed()],
        ];
    }
}
